<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|max:50',
            'password' => 'required|max:8',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'username harus diisi',
            'username.max' => 'maximal username 50 karakter',
            'password.required' => 'password harus diisi',
            'password.max' => 'maximal password 8 karakter',
        ];
    }
}
