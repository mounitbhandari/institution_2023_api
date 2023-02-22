<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://127.0.0.1/institution_2023_api/public/api/*',
        'http://192.168.*',
        'https://eduvenv.in/institution_2023_api/public/api/*'
    ];
}
