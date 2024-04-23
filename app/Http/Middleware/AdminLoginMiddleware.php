<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminLoginMiddleware
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
        if (Auth::check() && $request->session()->has('login_time')) {
            $loginTime = $request->session()->get('login_time');
            $expirationTime = now()->subMinutes(5);

            if ($loginTime < $expirationTime) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('login')->with('error', 'Your session has expired. Please login again.');
            }
        }

        return $next($request);
    }
}
