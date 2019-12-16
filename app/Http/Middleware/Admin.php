<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{

    public function handle($request, Closure $next)
    {
        if(Auth::user()->role_id!=1){
          return redirect('admin');
        }
        return $next($request);
    }
}
