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
            if(!Auth::guard('employee')->user()->approved) {
                Auth::guard('employee')->logout();
                return redirect('/employee/login')->with('message', trans('global.yourAccountNeedsAdminApproval'));
            }else{ 
                return $next($request);
            }
        }else {
            return redirect('/employee/login')->with('error', "you should login");
        }
    }
}
