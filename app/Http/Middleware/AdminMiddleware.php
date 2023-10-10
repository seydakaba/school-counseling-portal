<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('teacher') && $request->session()->get('teacher')->role == 1){
            return $next($request);
        }
        else{
            return redirect('/giris'); 
        }
    }
}
