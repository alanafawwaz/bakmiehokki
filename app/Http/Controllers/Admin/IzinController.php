<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Izin;
use Exception;
use Alert;

class IzinController extends Controller
{
    public function index()
    {
        $izins = Izin::select('id', 'tanggal', 'alasan', 'surat', 'pegawai_id')
                        ->orderBy('tanggal', 'desc')
                        ->paginate(5);

        return view('admin.izin.index', compact('izins'));
    }

    public function show($id)
    {
        try {

            $izin = Izin::where('id', $id)->first();

            if (!$izin) {
                Alert::error('Maaf', 'Data tidak ditemukan');
                return redirect('/admin/izin');
            }

            return view('admin.izin.show', compact('izin'));
        }catch(Exception $e){
            alert()->error('error', 'Terjadi Kesalahan');
            return redirect('/admin/izin');
        }
    }
}
