<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next)
    {
        // If the user is authenticated, redirect them away from /home
        if (Auth::check()) {
            return redirect()->route('loginhome'); // Redirect to a page for authenticated users
        }

        return $next($request);
    }
}
