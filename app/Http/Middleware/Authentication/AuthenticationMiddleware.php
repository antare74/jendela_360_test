<?php

namespace App\Http\Middleware\Authentication;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;

class AuthenticationMiddleware
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
        if (Sentinel::check())
        {
            mySession(false, 'login successfully');
            return $next($request);
        }
        else
        {
            mySession(false, 'you must login to see this page!');
            return back();
        }
    }
}
