<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioImage;
use App\Models\PortfolioItem;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $items = PortfolioItem::orderBy('sort_order')->get();

        return view('admin.portfolio.index', compact('items'));
    }

    public function create()
    {
        return view('admin.portfolio.form', ['item' => new PortfolioItem]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'slug'              => ['nullable', 'string', 'max:255', 'unique:portfolio_items,slug'],
            'image'             => ['required', 'image', 'mimes:jpeg,png,gif,webp', 'max:4096'],
            'subtitle'          => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'description'       => ['nullable', 'string'],
            'details'           => ['nullable', 'string'],
            'client'            => ['nullable', 'string', 'max:255'],
            'project_date'      => ['nullable', 'string', 'max:100'],
            'category'          => ['nullable', 'string', 'max:255'],
            'website_url'       => ['nullable', 'url'],
            'link_type'         => ['required', 'in:page,lightbox,external'],
            'external_url'      => ['nullable', 'url'],
            'is_featured'       => ['boolean'],
            'is_active'         => ['boolean'],
            'sort_order'        => ['nullable', 'integer', 'min:0'],
        ]);

        $data['slug']        = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['title']);
        $data['image']       = $this->uploadImage($request->file('image'), 'portfolio', 1200, 800);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active', true);

        PortfolioItem::create($data);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item created.');
    }

    public function edit(PortfolioItem $portfolio)
    {
        return view('admin.portfolio.form', ['item' => $portfolio->load('images')]);
    }

    public function update(Request $request, PortfolioItem $portfolio)
    {
        $data = $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'slug'              => ['nullable', 'string', 'max:255', 'unique:portfolio_items,slug,' . $portfolio->id],
            'image'             => ['nullable', 'image', 'mimes:jpeg,png,gif,webp', 'max:4096'],
            'subtitle'          => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'description'       => ['nullable', 'string'],
            'details'           => ['nullable', 'string'],
            'client'            => ['nullable', 'string', 'max:255'],
            'project_date'      => ['nullable', 'string', 'max:100'],
            'category'          => ['nullable', 'string', 'max:255'],
            'website_url'       => ['nullable', 'url'],
            'link_type'         => ['required', 'in:page,lightbox,external'],
            'external_url'      => ['nullable', 'url'],
            'is_featured'       => ['boolean'],
            'is_active'         => ['boolean'],
            'sort_order'        => ['nullable', 'integer', 'min:0'],
        ]);

        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'), 'portfolio', 1200, 800, $portfolio->image);
        } else {
            unset($data['image']);
        }

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active');

        $portfolio->update($data);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item updated.');
    }

    public function destroy(PortfolioItem $portfolio)
    {
        foreach ($portfolio->images as $img) {
            $this->deleteImage($img->image);
        }
        $this->deleteImage($portfolio->image);
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item deleted.');
    }

    public function storeImage(Request $request, PortfolioItem $portfolio)
    {
        $request->validate([
            'images'   => ['required', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,gif,webp', 'max:4096'],
        ]);

        foreach ($request->file('images') as $index => $file) {
            $path = $this->uploadImage($file, 'portfolio/gallery', 1200, 800);
            PortfolioImage::create([
                'portfolio_item_id' => $portfolio->id,
                'image'             => $path,
                'sort_order'        => $index,
            ]);
        }

        return redirect()->route('admin.portfolio.edit', $portfolio)->with('success', 'Images uploaded.');
    }

    public function destroyImage(int $id)
    {
        $img      = PortfolioImage::findOrFail($id);
        $itemId   = $img->portfolio_item_id;
        $this->deleteImage($img->image);
        $img->delete();

        return redirect()->route('admin.portfolio.edit', $itemId)->with('success', 'Image deleted.');
    }
}
