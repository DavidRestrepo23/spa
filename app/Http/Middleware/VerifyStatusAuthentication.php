<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class VerifyStatusAuthentication
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
        if(auth()->user()->status == 'inactive'){
            Auth::logout();
            return back()->with('flash', 'No tienes permiso para acceder al blog.'); 
        }   
        return $next($request);
    }
}
