<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        /* if ($request->user()->role == $role) {
            return $next($request);
        } */

        $roles = array_slice(func_get_args(), 2);

        foreach ($roles as $role) { 
            $user = \Auth::user()->role;
            if( $user == $role){
                return $next($request);
            }
        }

        
        abort(403, 'Anda tidak memiliki hak mengakses laman tersebut!');
        //return redirect('/');
    }
}
