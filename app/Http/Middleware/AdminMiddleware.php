<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if user is authenticated
        if (Auth::check() && Auth::user()->role == 'admin') {
            // User is an admin, allow access
            return $next($request);
        }

        // Redirect to login if user is not authenticated or not an admin
        return redirect()->route('login');
    }
}
