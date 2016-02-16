<?php

namespace Musicshop\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @internal param null $guard
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guest() && Auth::user()->is_admin) {
            return $next($request);
        }

        return redirect('/');
    }
}
