<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShiftRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'pegawai_id' => 'required|exists:users,id',
            'tanggal' => 'required|date|date_format:Y-m-d',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i|after:start',
            'jobdesk' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pegawai_id.required' => 'pegawai harus dipilih',
            'pegawai_id.exists' => 'data pegawai tidak ditemukan',
            'start.required' => 'waktu awal harus diisi',
            'start.date_format' => 'waktu awal harus berformat H:i',
            'end.required' => 'waktu akhir harus diisi',
            'end.date_format' => 'waktu akhir harus berformat H:i',
            'end.after' => 'waktu akhir harus lebih dari waktu awal',
            'tanggal.required' => 'tanggal harus diisi',
            'tanggal.date' => 'invalid tipe tanggal',
            'tanggal.date_format' => 'tanggal harus berformat Y-m-d',
            'jobdesk.required' => 'jobdesk harus diisi',
        ];
    }
}
