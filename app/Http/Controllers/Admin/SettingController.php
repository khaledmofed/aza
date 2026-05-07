<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $settings = Setting::pluck('value', 'key');

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name'        => ['required', 'string', 'max:255'],
            'site_email'       => ['nullable', 'email'],
            'site_phone'       => ['nullable', 'string', 'max:50'],
            'site_address'     => ['nullable', 'string', 'max:500'],
            'site_website'     => ['nullable', 'url'],
            'social_twitter'   => ['nullable', 'url'],
            'social_facebook'  => ['nullable', 'url'],
            'social_github'    => ['nullable', 'url'],
            'social_googleplus'=> ['nullable', 'url'],
            'footer_copyright' => ['nullable', 'string', 'max:255'],
            'quote_text'       => ['nullable', 'string'],
            'quote_author'     => ['nullable', 'string', 'max:255'],
            'cta_text'         => ['nullable', 'string', 'max:255'],
            'facts_heading'    => ['nullable', 'string', 'max:255'],
            'custom_css'       => ['nullable', 'string'],
            'custom_js'        => ['nullable', 'string'],
            'site_logo'        => ['nullable', 'image', 'mimes:jpeg,png,gif,webp', 'max:2048'],
            'parallax1_image'  => ['nullable', 'image', 'mimes:jpeg,png,gif,webp', 'max:4096'],
            'parallax2_image'  => ['nullable', 'image', 'mimes:jpeg,png,gif,webp', 'max:4096'],
            'parallax3_image'  => ['nullable', 'image', 'mimes:jpeg,png,gif,webp', 'max:4096'],
            'parallax4_image'  => ['nullable', 'image', 'mimes:jpeg,png,gif,webp', 'max:4096'],
        ]);

        $textFields = [
            'site_name', 'site_email', 'site_phone', 'site_address', 'site_website',
            'social_twitter', 'social_facebook', 'social_github', 'social_googleplus',
            'footer_copyright', 'quote_text', 'quote_author', 'cta_text',
            'facts_heading', 'custom_css', 'custom_js',
        ];

        foreach ($textFields as $field) {
            Setting::set($field, $request->input($field));
        }

        // Handle image uploads
        $imageFields = ['site_logo', 'parallax1_image', 'parallax2_image', 'parallax3_image', 'parallax4_image'];
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $old  = Setting::get($field);
                $path = $this->uploadImage($request->file($field), 'settings', 1200, null, $old);
                Setting::set($field, $path);
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
