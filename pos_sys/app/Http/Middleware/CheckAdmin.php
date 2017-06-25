<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$p)
    {
        /*if ($request->age <= 200) {
            return redirect('/home');
        }*/

        /*if ($a == 1)
        {
            return redirect('/home');
        }*/

        //print_r($p);


   /*     $roles = array_except(func_get_args(), [0,1]);
        dd($roles);*/
        dd($p);

        exit;


        return $next($request);
    }
}
