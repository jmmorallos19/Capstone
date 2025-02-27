<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // First check if the user is authenticated
        if (!Auth::check()) {
            // If not authenticated, redirect to login
            return redirect()->route('login')->with('error', 'Please log in to continue.');
        }

        // Now that the user is authenticated, check their account status
        if (Auth::user()->status == 'inactive') {
            // Log the user out if their account is inactive
            Auth::logout();

            // Redirect them back with an error message
            return redirect()->route('login')->with('error', 'Your account has been deactivated by the administrator.');
        }

        // Proceed with the request if the user is active
        return $next($request);
    }
}
