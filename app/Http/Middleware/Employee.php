<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Employee
{

    public function handle($request, Closure $next)
    {
        if(Auth::user()->role_id!=2){
          return redirect('admin');
        }
        return $next($request);
    }
}
