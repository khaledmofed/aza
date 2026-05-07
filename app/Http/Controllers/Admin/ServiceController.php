<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $services = Service::orderBy('sort_order')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form', ['service' => new Service]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon_image'  => ['nullable', 'image', 'mimes:jpeg,png,gif,webp', 'max:2048'],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
            'is_active'   => ['boolean'],
        ]);

        if ($request->hasFile('icon_image')) {
            $data['icon_image'] = $this->uploadImage($request->file('icon_image'), 'services', 200, 200);
        }

        $data['is_active'] = $request->boolean('is_active', true);

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon_image'  => ['nullable', 'image', 'mimes:jpeg,png,gif,webp', 'max:2048'],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
            'is_active'   => ['boolean'],
        ]);

        if ($request->hasFile('icon_image')) {
            $data['icon_image'] = $this->uploadImage($request->file('icon_image'), 'services', 200, 200, $service->icon_image);
        } else {
            unset($data['icon_image']);
        }

        $data['is_active'] = $request->boolean('is_active');

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated.');
    }

    public function destroy(Service $service)
    {
        $this->deleteImage($service->icon_image);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted.');
    }
}
