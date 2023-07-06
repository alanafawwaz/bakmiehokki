<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hadir;

class HadirController extends Controller
{
    public function index()
    {
        $hadirs = Hadir::select('id', 'pegawai_id', 'tanggal', 'jam', 'date_full')
                        ->orderBy('tanggal', 'desc')
                        ->orderBy('jam', 'desc')
                        ->paginate(5);

        return view('admin.hadir.index', compact('hadirs'));
    }
}
