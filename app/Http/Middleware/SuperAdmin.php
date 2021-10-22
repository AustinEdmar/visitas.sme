<?php

namespace App\Http\Middleware;
use App\User;
use Closure;

class SuperAdmin
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
        if(auth()->user()->level->id == '1' || auth()->user()->level->id == '2'){
            return $next($request);
        }
        return redirect('noacesso');


    }
}
