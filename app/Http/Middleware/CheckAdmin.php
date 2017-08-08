<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckAdmin
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
         if(User::checkAdmin()) {
            return $next($request);
         }

         return redirect()->route('home');

    }
}
