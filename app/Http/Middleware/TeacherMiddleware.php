<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeacherMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('teacher') && $request->session()->get('teacher')->role == 2){
            return $next($request);
        }
        else{
            return redirect(''); 
        }
    }
}
