<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\ValidatePostSize as BaseValidatePostSize;

class ValidatePostSize extends BaseValidatePostSize
{
    protected function getPostMaxSize(): int
    {
        // Allow up to 50MB regardless of php.ini setting on shared hosting
        return 50 * 1024 * 1024;
    }
}
