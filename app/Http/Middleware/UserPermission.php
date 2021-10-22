<?php

namespace App\Http\Middleware;

use Closure;

class UserPermission
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
        if(auth()->user()->level->id == '1' || auth()->user()->level->id == '4'){
            /* && auth()->user()->level->id == '4' */
            return $next($request);
        }
        return redirect('noacesso');
    }
}
