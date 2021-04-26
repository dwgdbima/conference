<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Participant
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
        if (auth()->user()->role->name == 'participant') {
            return $next($request);
        }

        if (auth()->user()->role->name == 'admin') {
            return abort(404);
        }

        if (auth()->user()->role->name == 'reviewer') {
            return abort(404);
        }
    }
}
