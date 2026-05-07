<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Retrieve a site setting by key, with optional default.
     */
    function setting(string $key, mixed $default = null): mixed
    {
        return Setting::get($key, $default);
    }
}

if (!function_exists('asset_image')) {
    /**
     * Return the correct URL for an image path stored in DB.
     * Paths starting with 'assets/' are public folder assets → use asset().
     * Other paths are storage uploads → use Storage::disk('public')->url().
     */
    function asset_image(?string $path, string $placeholder = ''): string
    {
        if (!$path) {
            return $placeholder;
        }
        if (str_starts_with($path, 'assets/') || str_starts_with($path, 'http')) {
            return str_starts_with($path, 'http') ? $path : asset($path);
        }
        return \Illuminate\Support\Facades\Storage::disk('public')->url($path);
    }
}
