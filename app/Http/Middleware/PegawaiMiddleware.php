<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PegawaiMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role != 'pegawai'){
            alert()->error('Oops', 'Anda bukan pegawai');
            return redirect()->back();
        }
        return $next($request);
    }
}
