<?php

namespace App\Http\Middleware;

use Closure;

class AccessAdmin
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
        if (auth()->user()->admin == 1) {
            return $next($request);
        }
        return redirect('home');
    }
}
