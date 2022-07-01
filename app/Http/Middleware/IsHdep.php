<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsHdep
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
        if(auth()->user()->right->title=='isAdmin'|| auth()->user()->right->title=='isHd'){
            return $next($request);
        }else{
            //  dd($request);
            abort(403);
            // return redirect()->route('403');
        }
    }
}
