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
        // jesli user nie jest zalogowany
        if ($request->user() === null) {
            return response("Insufficient permission", 401);
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if ($reuest->user()->hasAnyRole($roles) || !roles) {
            return $next($request);
        }
        return response("Insufficient permissions", 401);

        // if (! $request->user()->hasRole($role)) {
        //     return redirect('home');
        // }
    }
}
