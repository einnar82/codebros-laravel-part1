<?php

namespace App\Http\Middleware;

use App\Post;
use Closure;

class CheckPostCountLimit
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
        if (Post::count() > 1) {
            return response()->json(['message' => 'Post limit reached!'], 403);
        }
        return $next($request);
    }
}
