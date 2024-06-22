<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
class EnsureEmailIsVerified
{
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (!Auth::check() || !Auth::user()->hasVerifiedEmail()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Your email address is not verified.'], 403);
            }
            return redirect()->route('verification.notice')->with('message', 'Your email address is not verified. Please verify your email.');
        }

        return $next($request);
    }
}
