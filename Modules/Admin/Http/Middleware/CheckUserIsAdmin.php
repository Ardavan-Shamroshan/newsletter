<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        // if user is admin
        if (auth()->user()->user_type == 1)
            return $next($request);
        return to_route('home');
    }
}
