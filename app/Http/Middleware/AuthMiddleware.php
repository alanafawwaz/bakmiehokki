<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->check()){
            alert()->error('Oops', 'Anda harus login dahulu');
            return redirect('/');
        }
        return $next($request);
    }
}
