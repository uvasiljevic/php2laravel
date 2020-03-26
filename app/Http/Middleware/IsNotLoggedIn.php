<?php

namespace App\Http\Middleware;

use Closure;

class IsNotLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->session()->has('user')){
            return redirect("/")->with('message', 'MIDDLEWARE: You are not logged in');
        }
        return $next($request);
    }
}
