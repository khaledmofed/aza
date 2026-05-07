<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogImage;
use App\Models\BlogPost;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    use ImageUploadTrait;

    private array $types = ['image', 'video', 'quote', 'carousel', 'audio'];

    private array $iconCodes = [
        'f040' => 'Pencil (Edit)',
        'f03d' => 'Video Camera',
        'f10d' => 'Quote Left',
        'f083' => 'Camera Retro',
        'f001' => 'Music',
        'f03e' => 'Image/Photo',
        'f0a1' => 'Bullhorn',
        'f02d' => 'Book',
        'f0eb' => 'Lightbulb',
    ];

    public function index()
    {
        $posts = BlogPost::with('images')->latest()->paginate(15);

        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.form', [
            'post'      => new BlogPost,
            'types'     => $this->types,
            'iconCodes' => $this->iconCodes,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatePost($request);

        $data['slug']         = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published', true);
        $data['published_at'] = $data['published_at'] ?? now();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->uploadImage($request->file('featured_image'), 'blog', 800, 600);
        }

        if ($request->hasFile('audio_file')) {
            $data['audio_file'] = $request->file('audio_file')->store('blog/audio', 'public');
        }

        $post = BlogPost::create($data);

        if ($request->hasFile('carousel_images')) {
            foreach ($request->file('carousel_images') as $index => $file) {
                $path = $this->uploadImage($file, 'blog/carousel', 800, 600);
                BlogImage::create(['blog_post_id' => $post->id, 'image' => $path, 'sort_order' => $index]);
            }
        }

        return redirect()->route('admin.blog.index')->with('success', 'Blog post created.');
    }

    public function edit(BlogPost $blog)
    {
        return view('admin.blog.form', [
            'post'      => $blog->load('images'),
            'types'     => $this->types,
            'iconCodes' => $this->iconCodes,
        ]);
    }

    public function update(Request $request, BlogPost $blog)
    {
        $data = $this->validatePost($request, $blog->id);

        $data['slug']         = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->uploadImage($request->file('featured_image'), 'blog', 800, 600, $blog->featured_image);
        } else {
            unset($data['featured_image']);
        }

        if ($request->hasFile('audio_file')) {
            $this->deleteImage($blog->audio_file);
            $data['audio_file'] = $request->file('audio_file')->store('blog/audio', 'public');
        } else {
            unset($data['audio_file']);
        }

        $blog->update($data);

        if ($request->hasFile('carousel_images')) {
            foreach ($request->file('carousel_images') as $index => $file) {
                $path = $this->uploadImage($file, 'blog/carousel', 800, 600);
                BlogImage::create(['blog_post_id' => $blog->id, 'image' => $path, 'sort_order' => $index]);
            }
        }

        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated.');
    }

    public function destroy(BlogPost $blog)
    {
        $this->deleteImage($blog->featured_image);
        $this->deleteImage($blog->audio_file);
        foreach ($blog->images as $img) {
            $this->deleteImage($img->image);
        }
        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted.');
    }

    public function storeImage(Request $request, BlogPost $blog)
    {
        $request->validate([
            'images'   => ['required', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,gif,webp', 'max:4096'],
        ]);

        foreach ($request->file('images') as $index => $file) {
            $path = $this->uploadImage($file, 'blog/carousel', 800, 600);
            BlogImage::create(['blog_post_id' => $blog->id, 'image' => $path, 'sort_order' => $index]);
        }

        return redirect()->route('admin.blog.edit', $blog)->with('success', 'Images uploaded.');
    }

    public function destroyImage(int $id)
    {
        $img    = BlogImage::findOrFail($id);
        $postId = $img->blog_post_id;
        $this->deleteImage($img->image);
        $img->delete();

        return redirect()->route('admin.blog.edit', $postId)->with('success', 'Image deleted.');
    }

    private function validatePost(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'title'          => ['required', 'string', 'max:255'],
            'slug'           => ['nullable', 'string', 'max:255', 'unique:blog_posts,slug' . ($ignoreId ? ',' . $ignoreId : '')],
            'type'           => ['required', 'in:image,video,quote,carousel,audio'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,gif,webp', 'max:4096'],
            'video_url'      => ['nullable', 'url'],
            'audio_file'     => ['nullable', 'mimes:mp3,ogg,wav', 'max:20480'],
            'quote_text'     => ['nullable', 'string'],
            'quote_author'   => ['nullable', 'string', 'max:255'],
            'excerpt'        => ['nullable', 'string'],
            'content'        => ['nullable', 'string'],
            'icon_code'      => ['nullable', 'string', 'max:10'],
            'published_at'   => ['nullable', 'date'],
            'is_published'   => ['boolean'],
        ]);
    }
}
