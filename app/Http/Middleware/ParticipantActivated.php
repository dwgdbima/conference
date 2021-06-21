<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ParticipantActivated
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
        if (auth()->user()->hasVerifiedEmail() && auth()->user()->active == 0) {
            if ($request->routeIs('participant.activated')) {
                return $next($request);
            } else {
                return redirect()->route('participant.activated');
            }
        }

        if (auth()->user()->hasVerifiedEmail() && auth()->user()->active == 1) {
            if ($request->routeIs('participant.activated')) {
                return redirect()->route('participant.dashboard.index');
            } else {
                return $next($request);
            }
        }

        return $next($request);
    }
}
