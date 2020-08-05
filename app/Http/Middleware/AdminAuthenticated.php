<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return $next($request);
        }else{
            return redirect('/admin/login');

        }
    }
}
