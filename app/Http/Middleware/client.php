<?php

namespace App\Http\Middleware;

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class client
{
    public function handle($request, Closure $next)
    {
        if(Auth::guard('client')->user() != null){
            return $next($request);
        }else {
            return redirect('/client/login')->with('error', "you should login");
        }
    }
}
