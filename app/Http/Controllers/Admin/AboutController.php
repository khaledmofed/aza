<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutImage;
use App\Models\AboutSection;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $about  = AboutSection::instance();
        $images = AboutImage::ordered()->get();

        return view('admin.about.index', compact('about', 'images'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'heading'      => ['required', 'string', 'max:255'],
            'subheading'   => ['required', 'string', 'max:255'],
            'subtext'      => ['required', 'string'],
            'body_text'    => ['required', 'string'],
            'col1_heading' => ['required', 'string', 'max:255'],
            'col1_text'    => ['required', 'string'],
            'col2_heading' => ['required', 'string', 'max:255'],
            'col2_text'    => ['required', 'string'],
            'col3_heading' => ['required', 'string', 'max:255'],
            'col3_text'    => ['required', 'string'],
        ]);

        AboutSection::instance()->update($data);

        return redirect()->route('admin.about.index')->with('success', 'About section updated successfully.');
    }

    public function storeImage(Request $request)
    {
        $request->validate([
            'image'      => ['required', 'image', 'mimes:jpeg,png,gif,webp', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $path = $this->uploadImage($request->file('image'), 'about', 800, 600);

        AboutImage::create([
            'image'      => $path,
            'sort_order' => $request->input('sort_order', 0),
        ]);

        return redirect()->route('admin.about.index')->with('success', 'Image added.');
    }

    public function destroyImage(int $id)
    {
        $img = AboutImage::findOrFail($id);
        $this->deleteImage($img->image);
        $img->delete();

        return redirect()->route('admin.about.index')->with('success', 'Image deleted.');
    }
}
