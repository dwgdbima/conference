<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Reviewer
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
        if (auth()->user()->role->name == 'reviewer') {
            return $next($request);
        }

        if (auth()->user()->role->name == 'admin') {
            return abort(404);
        }

        if (auth()->user()->role->name == 'participant') {
            return abort(404);
        }
    }
}
