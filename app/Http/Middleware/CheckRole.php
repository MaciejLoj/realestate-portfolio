<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        echo "Siema pomaranczowe";
        // if (! $request->user()->hasRole($role)) {
        //     return redirect('home');
        // }
        return $next($request);
    }
}
