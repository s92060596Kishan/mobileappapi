<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkapi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('Authorization');

        if ($apiKey !== 'Bearer ABC123') {
            return response()->json($apiKey, Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
