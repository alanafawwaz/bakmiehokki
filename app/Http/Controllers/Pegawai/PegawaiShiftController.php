<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shift;

class PegawaiShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::where('pegawai_id', auth()->user()->id)
                        ->select('id', 'pegawai_id', 'tanggal', 'start', 'end', 'jobdesk')
                        ->orderBy('tanggal', 'desc')
                        ->paginate(5);

        return view('pegawai.shift.index', compact('shifts'));
    }

    public function show($id)
    {
        $shift = Shift::where('id', $id)->first();

        if($shift->pegawai_id != auth()->user()->id){
            alert()->error('Maaf', 'Data bukan milik anda');
            return redirect('/pegawai/shift');
        }

        return view('pegawai.shift.show', compact('shift'));
    }
}
