<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OperatorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('student')) {
            return redirect('/home')->with('alert', 'Akses Dilarang!');
        }

        if (auth()->user()->role == 'operator') {
            return $next($request);
        } else {
            return redirect('/dashboard')->with('alert', 'Akses Dilarang!');
        }

        return $next($request);
    }
}
