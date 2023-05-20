<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'ketersediaan' => 'required',
            'tanggal' => 'required|date|date_format:Y-m-d'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'nama bahan harus diisi',
            'name.max' => 'maximal nama bahan 100 karakter',
            'ketersediaan.required' => 'ketersediaan harus diisi',
            'tanggal.required' => 'tanggal harus diisi',
            'tanggal.date' => 'invalid tipe tanggal',
            'tanggal.date_format' => 'tanggal harus berformat Y-m-d',
        ];
    }
}
