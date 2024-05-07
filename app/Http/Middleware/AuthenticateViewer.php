<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateViewer
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
        // For logout functionality, log the user out if it's a logout request
        if ($request->isMethod('post') && $request->routeIs('logout')) {
            if (Auth::check()) {
                Auth::logout();
            }
            return redirect()->route('login');
        }

        // For other routes, check if the user is authenticated.
        // If not, and the request is not already for the login route,
        // redirect to the login page with the intended URL.
        if (!Auth::check() && !$request->routeIs('login')) {
            return redirect()->route('login')->with('url.intended', $request->path());
        }

        return $next($request);
    }
}
