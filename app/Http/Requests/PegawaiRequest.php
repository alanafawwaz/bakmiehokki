<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:150',
            'telp' => 'required|max:13',
            'type' => 'required|in:full,part',
            'gender' => 'required|in:L,P',
            'posisi' => 'required|in:kitchen,dishwash,gudang',
            'domisili' => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'pegawai harus dipilih',
            'name.max' => 'maximal nama pegawai 150 karakter',
            'telp.required' => 'nomor telepon pegawai harus diisi',
            'telp.max' => 'maximal nomor telepon 13 karakter',
            'type.required' => 'tipe kerja harus dipilih',
            'type.in' => 'tipe kerja tidak valid',
            'gender.required' => 'jobdesk harus dipilih',
            'gender.in' => 'gender tidak valid',
            'posisi.required' => 'posisi harus dipilih',
            'posisi.in' => 'posisi tidak valid',
            'domisili.required' => 'domisili harus diisi',
            'domisili.in' => 'maximal domisili 50 karakter',
        ];
    }
}
