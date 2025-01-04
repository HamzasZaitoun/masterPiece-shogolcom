<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and their role is 'admin'
        if (Auth::check() && Auth::user()->role !== 'admin') {
            // If the role is not 'admin', redirect to home or another page
            return redirect('/home')->with('error', 'You do not have access to the admin dashboard.');
        }

        // If the user is an admin, allow the request to continue
        return $next($request);
    }
}
