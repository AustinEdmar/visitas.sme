<?php

namespace App\Http\Middleware;

use Closure;

class UserAdmin
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
        if(auth()->user()->level->id == '3'){
            return $next($request);
           //return redirect('/area');
        }

        return redirect('noacesso');
    }
}
