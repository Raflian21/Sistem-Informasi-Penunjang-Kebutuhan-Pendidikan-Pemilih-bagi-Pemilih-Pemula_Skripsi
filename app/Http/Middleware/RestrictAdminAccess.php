<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestrictAdminAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in and if their ID is 0
        if (Auth::check() && Auth::user()->id !== 0) {
            // Redirect or abort access
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
