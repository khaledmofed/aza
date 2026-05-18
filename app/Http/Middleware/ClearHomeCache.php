<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClearHomeCache
{
    public function handle(Request $request, Closure $next): mixed
    {
        $response = $next($request);

        // Clear home page cache after any write operation in admin
        if (in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE'])) {
            Cache::forget('home.page.data');
        }

        return $response;
    }
}
