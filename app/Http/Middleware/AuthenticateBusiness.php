<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateBusiness
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('business')->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in as a business to access this page.');
        }

        return $next($request);
    }
}
