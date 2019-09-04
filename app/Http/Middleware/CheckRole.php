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
        // jesli user nie jest zalogowany, jesli nie ma usera
        if ($request->user() == null){
            return redirect('/login');
        }

        $actions = $request->route()->getAction();
        //sprawdzamy czy dana strona moze byc odczytana wylacznie przez konkretne role
        // operator trojoperandowy - jesli jest ustawiony actions['roles'] to $roles = $actions['roles'] a jak nie to $roles = null
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        // jesli user ma role jedna z rol uprawnionych do danej strony lub  konkretne role nie istnieja to pozwol na dostep
        if ($request->user()->hasAnyRole($roles)){
            return $next($request);
        }
        return response("Insufficient permissions", 401);
        //
    }
}
