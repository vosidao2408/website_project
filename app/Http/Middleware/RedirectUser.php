<?php

namespace App\Http\Middleware;

use Closure;
use App\Article;
use App\User;

class RedirectUser
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
        $id = User::authUser()->id;
        $check = Article::where('user_id',$id)->exists();
        if (!$check) {
        return $next($request);
        }
        return redirect('home/posts');
    }
}
