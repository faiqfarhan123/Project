<?php

namespace App\Http\Middleware;

use Closure;

class AlreadyOnlineMiddleware
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
        if (\Session::get('fullName') != '') {
            return \Redirect::to('dashboard');
        }
        
        return $next($request);
    }
}
