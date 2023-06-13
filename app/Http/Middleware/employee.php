<?php

namespace App\Http\Middleware;

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class employee
{
    public function handle($request, Closure $next)
    {
        if(Auth::guard('employee')->user() != null){
            return $next($request);
        }else {
            return redirect('/employee/login')->with('error', "you should login");
        }
    }
}
