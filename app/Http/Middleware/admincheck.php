<?php

namespace App\Http\Middleware;

use Closure;

class admincheck
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
        if(session('admin')!='admin'){
            return redirect('/');
        }
        return $next($request);
    }
}
