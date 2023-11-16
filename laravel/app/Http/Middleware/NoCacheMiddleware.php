<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoCacheMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        
        $response->headers->add(['Cache-Control' => 'no-store,no-cache,must-revalidate,max-age=0',
        'Pragma' => 'Sat, 01 jan 2000 00:00:00 GMT',
    ]);

        return $response;
    }
}