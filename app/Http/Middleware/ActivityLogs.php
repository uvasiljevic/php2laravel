<?php

namespace App\Http\Middleware;
use App\Models\Logs;
use Closure;

class ActivityLogs
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

        $logs = new Logs;

        $logs->page  = $request->path();
        $logs->date  = date('Y-m-d H:i:s');
        $logs->ip    = $request->ip();

        $logs->save();

        return $next($request);

    }
}
