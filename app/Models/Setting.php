<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    // Cache all settings for 60 minutes — one DB query per hour instead of per request
    private static function all_cached(): array
    {
        return Cache::remember('settings.all', 3600, function () {
            return static::pluck('value', 'key')->toArray();
        });
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return static::all_cached()[$key] ?? $default;
    }

    public static function set(string $key, mixed $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        // Clear cache so next request fetches fresh data
        Cache::forget('settings.all');
    }
}
