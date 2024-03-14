<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class employeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //  dd(auth()->user());
        if (auth()->check() && auth()->user()->role == 'employee') {
            return $next($request);
        }
        else
        {
            abort(403, 'Unauthorized');
        }     
    }
}

