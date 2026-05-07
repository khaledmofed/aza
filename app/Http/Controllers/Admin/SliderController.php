<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $sliders = Slider::orderBy('sort_order')->get();

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.form', ['slider' => new Slider, 'transitions' => $this->transitions()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image'           => ['required', 'image', 'mimes:jpeg,png,gif,webp', 'max:4096'],
            'subtitle'        => ['nullable', 'string', 'max:255'],
            'title'           => ['nullable', 'string', 'max:255'],
            'title_highlight' => ['nullable', 'string', 'max:255'],
            'transition'      => ['required', 'string'],
            'sort_order'      => ['nullable', 'integer', 'min:0'],
            'is_active'       => ['boolean'],
        ]);

        $data['image']     = $this->uploadImage($request->file('image'), 'sliders', 1920, 900);
        $data['is_active'] = $request->boolean('is_active', true);

        Slider::create($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Slide created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.form', ['slider' => $slider, 'transitions' => $this->transitions()]);
    }

    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'image'           => ['nullable', 'image', 'mimes:jpeg,png,gif,webp', 'max:4096'],
            'subtitle'        => ['nullable', 'string', 'max:255'],
            'title'           => ['nullable', 'string', 'max:255'],
            'title_highlight' => ['nullable', 'string', 'max:255'],
            'transition'      => ['required', 'string'],
            'sort_order'      => ['nullable', 'integer', 'min:0'],
            'is_active'       => ['boolean'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'), 'sliders', 1920, 900, $slider->image);
        } else {
            unset($data['image']);
        }

        $data['is_active'] = $request->boolean('is_active');

        $slider->update($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Slide updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        $this->deleteImage($slider->image);
        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slide deleted.');
    }

    private function transitions(): array
    {
        return [
            'papercut', '3dcurtain-horizontal', '3dcurtain-vertical',
            'scaledownfromleft', 'scaledownfromright',
            'fadefromleft', 'fadefromright', 'fadefromtop', 'fadefrombottom',
            'slotslide-horizontal', 'slotslide-vertical',
            'random',
        ];
    }
}
