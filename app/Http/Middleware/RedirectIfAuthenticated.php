<?php

namespace HelpDesk\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        return $next($request);
    }
}