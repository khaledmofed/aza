<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        if (config('app.env') === 'production') {
            // Force HTTPS for all generated URLs (Render terminates SSL at LB)
            URL::forceScheme('https');

            // Also fix Storage disk URL so Storage::url() returns https://
            $appUrl = rtrim(config('app.url'), '/');
            $httpsUrl = preg_replace('/^http:/', 'https:', $appUrl);
            config(['filesystems.disks.public.url' => $httpsUrl . '/storage']);
        }
    }
}
