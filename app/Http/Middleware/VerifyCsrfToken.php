<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    // Your middleware logic goes here
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // Add routes here, for example:
        'api/*', // Excludes all routes under the 'api' prefix
        'admin/*', // Excludes all routes under the 'admin' prefix
        'api/putdata'
        // Add more routes as needed
    ];
}
