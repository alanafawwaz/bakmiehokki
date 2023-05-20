<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShiftRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shift;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = shift::select('id', 'pegawai_id', 'tanggal', 'start', 'end', 'jobdesk')
                        ->orderBy('id')
                        ->paginate(5);

        return view('admin.shift.index', compact('shifts'));
    }

    public function create()
    {
        $pegawai = User::select('id', 'name')->whereNotIn('id', [auth()->user()->id])->get();
        return view('admin.shift.create', compact('pegawai'));
    }

    public function store(ShiftRequest $request)
    {
        Shift::create([
            'pegawai_id' => $request->pegawai_id,
            'tanggal' => $request->tanggal,
            'start' => $request->start,
            'end' => $request->end,
            'jobdesk' => $request->jobdesk,
        ]);

        alert()->success('Mantap', 'Data berhasil ditambahkan');
        return redirect('/admin/shift');
    }

    public function edit($id)
    {
        $shift = Shift::where('id', $id)->first();
        if(!$shift){
            alert()->error('Maaf', 'Data tidak ditemukan');
            return redirect('/admin/shift');
        }

        $pegawai = User::select('id', 'name')->whereNotIn('id', [auth()->user()->id])->get();
        return view('admin.shift.edit', compact('pegawai', 'shift'));
    }

    public function update(ShiftRequest $request, $id)
    {
        $shift = Shift::where('id', $id)->first();
        if(!$shift){
            alert()->error('Maaf', 'Data tidak ditemukan');
            return redirect('/admin/shift');
        }

        $shift->update([
            'pegawai_id' => $request->pegawai_id,
            'tanggal' => $request->tanggal,
            'start' => $request->start,
            'end' => $request->end,
            'jobdesk' => $request->jobdesk,
        ]);

        alert()->success('Mantap', 'Data berhasil diupdate');
        return redirect('/admin/shift');
    }

    public function destroy($id)
    {
        $shift = Shift::where('id', $id)->first();
        if(!$shift){
            alert()->error('Maaf', 'Data tidak ditemukan');
            return redirect('/admin/shift');
        }

        $shift->delete();

        alert()->success('Mantap', 'Data berhasil dihapus');
        return redirect('/admin/shift');
    }
}
