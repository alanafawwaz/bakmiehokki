<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if(!$user){
            alert()->error('Maaf','Username tidak ditemukan');
            return redirect('/');
        }

        if(Auth::Attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])){
            alert()->success('👋 Welcome Back');
            return redirect('/dashboard');
        }

        alert()->error('Maaf','Password Salah');
        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        alert()->success('Mantap', 'Anda berhasil logout');
        return redirect('/');
    }
}
