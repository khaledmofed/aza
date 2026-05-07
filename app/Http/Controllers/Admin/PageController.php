<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $pages = Page::latest()->get();

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.form', ['page' => new Page]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => ['required', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255', 'unique:pages,slug'],
            'content'          => ['nullable', 'string'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'hero_image'       => ['nullable', 'image', 'mimes:jpeg,png,gif,webp', 'max:4096'],
            'is_published'     => ['boolean'],
        ]);

        $data['slug']         = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published', true);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $this->uploadImage($request->file('hero_image'), 'pages', 1920, 600);
        }

        Page::create($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page created.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.form', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'title'            => ['required', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255', 'unique:pages,slug,' . $page->id],
            'content'          => ['nullable', 'string'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'hero_image'       => ['nullable', 'image', 'mimes:jpeg,png,gif,webp', 'max:4096'],
            'is_published'     => ['boolean'],
        ]);

        $data['slug']         = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $this->uploadImage($request->file('hero_image'), 'pages', 1920, 600, $page->hero_image);
        } else {
            unset($data['hero_image']);
        }

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page updated.');
    }

    public function destroy(Page $page)
    {
        $this->deleteImage($page->hero_image);
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Page deleted.');
    }
}
