<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role != 'admin'){
            alert()->error('Oops', 'Anda bukan admin');
            return redirect()->back();
        }
        return $next($request);
    }
}
