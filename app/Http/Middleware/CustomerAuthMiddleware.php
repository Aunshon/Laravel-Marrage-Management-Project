<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CustomerAuthMiddleware
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
        if (Auth::user()->role == 2) {
            return redirect(url('user/home'));
            // echo "customer";
        }
        return $next($request);
    }
}
