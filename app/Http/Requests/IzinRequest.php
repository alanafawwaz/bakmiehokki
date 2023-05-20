<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IzinRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'alasan' => 'required|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'alasan.required' => 'alasan harus diisi',
            'alasan.max' => 'maximal username 1000 karakter',
        ];
    }
}
