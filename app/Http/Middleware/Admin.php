<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Session;
use Auth;


class Admin
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
        if (!Auth::user()->admin) {
            Session::flash('warning','You Not Have Permission to do this Task!');
            return redirect()->back();
        }

        return $next($request);
    }
}
