<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::check()){
            if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->isAdmin){
                return $next($request);
            }else{
            return redirect()->route('admin.user.login');

            }
        }
        else{
            return redirect()->route('admin.user.login');
        }
    }
}
