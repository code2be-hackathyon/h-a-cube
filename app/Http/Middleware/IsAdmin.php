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
        //TODO change

        // Auth::user()->userType_id == 0
        if (true) {
            return $next($request);
        }
        return response()->view('error_401', [], 401);
    }
}
