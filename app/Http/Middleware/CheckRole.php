<?php

namespace HelpDesk\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!$request->user()->hasRole($role)) {
//            return redirect('/');
//            abort(403);
            abort(403, 'No tienes autorización para ingresar.');
        }
        return $next($request);
    }
}
