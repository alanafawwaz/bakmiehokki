<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hadir;

class PegawaiHadirController extends Controller
{
    public function create()
    {
        return view('pegawai.hadir.create');
    }

    public function store(Request $request)
    {
        $check = Hadir::where('pegawai_id', auth()->user()->id)
                        ->where('tanggal', date('Y-m-d'))
                        ->first();

        if($check){
            alert()->error('Oops', 'Anda sudah absen hari ini');
            return redirect('/pegawai/hadir');
        }

        Hadir::create([
            'pegawai_id' => auth()->user()->id,
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i'),
        ]);

        alert()->success('Mantap', 'Berhasil melakukan absensi');
        return redirect('/pegawai/hadir');
    }
}
