<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
            return redirect("/")->with('message', 'MIDDLEWARE: Access denied!');
        }
        if($request->session()->has('user') && $request->session()->get('user')->roleId != 1){
            return redirect("/")->with('message', 'MIDDLEWARE: Access denied!');
        }
        return $next($request);
    }
}
