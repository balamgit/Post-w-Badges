<?php

namespace App\Http\Middleware;

use Closure;

class temp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {if ('2019-08-01 12:16:16'>now()){

        return $next($request);
    }
    else{
        return redirect('/logout');
    }
    }
    
}
