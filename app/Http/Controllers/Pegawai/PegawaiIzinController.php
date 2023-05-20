<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\IzinRequest;
use Illuminate\Http\Request;
use App\Models\Izin;
use Exception;
use Alert;

class PegawaiIzinController extends Controller
{
    public function index()
    {
        $izins = Izin::where('pegawai_id', auth()->user()->id)
                        ->select('id', 'tanggal', 'alasan', 'surat')
                        ->latest()
                        ->paginate(5);

        return view('pegawai.izin.index', compact('izins'));
    }

    public function create()
    {
        return view('pegawai.izin.create');
    }

    public function store(IzinRequest $request)
    {
        $rules = [
            'surat' => 'required|mimes:jpg,png,jpeg|max:5048',
        ];

        Validator::make($request->all(), $rules, $messages =
        [
            'surat.required' => 'surat harus diisi',
            'surat.mimes'    => 'surat harus berupa jpg, png atau jpeg',
            'surat.max'      => 'maximum surat adalah 5 MB',
        ])->validate();

        try {

            $suratFile      = $request->file('surat');
            $surat          = time() . '-' . $suratFile->getClientOriginalName();
            Storage::putFileAs('public/surat', $suratFile, $surat);

            Izin::create([
                'pegawai_id' => auth()->user()->id,
                'alasan' => $request->alasan,
                'tanggal' => date('Y-m-d'),
                'surat' => $surat,
            ]);

            Alert::success('Mantap', 'Data berhasil ditambahkan');
            return redirect('/pegawai/izin');
        }catch(Exception $e){
            if(Storage::disk('local')->exists('public/surat/' . $surat)){
                Storage::delete('public/surat/' . $surat);
            }

            alert()->error('error', 'Terjadi Kesalahan');
            return redirect('/pegawai/izin');
        }

    }

    public function edit($id)
    {
        try {
            $izin = Izin::where('id', $id)->first();

            if (!$izin) {
                Alert::error('Maaf', 'Data tidak ditemukan');
                return redirect('/pegawai/izin');
            }

            if($izin->pegawai_id != auth()->user()->id){
                Alert::error('Maaf', 'Data bukan milik anda');
                return redirect('/pegawai/izin');
            }

            return view('pegawai.izin.edit', compact('izin'));
        } catch (Exception $e) {
            Alert::error('Error', 'Terjadi Kesalahan');
            return redirect('/pegawai/izin');
        }
    }

    public function update(IzinRequest $request, $id)
    {
        $izin = Izin::where('id', $id)->first();

        if (!$izin) {
            Alert::error('Maaf', 'Data tidak ditemukan');
            return redirect('/pegawai/izin');
        }

        if($izin->pegawai_id != auth()->user()->id){
            Alert::error('Maaf', 'Data bukan milik anda');
            return redirect('/pegawai/izin');
        }

        $oriSurat = $izin->surat;

        $updateData = [
            'alasan' => $request->alasan,
        ];

        if($request->hasFile('surat')){

            $rules = [
                'surat' => 'required|mimes:jpg,png,jpeg|max:5048',
            ];

            Validator::make($request->all(), $rules, $messages =
            [
                'surat.required' => 'surat harus diisi',
                'surat.mimes'    => 'surat harus berupa jpg, png atau jpeg',
                'surat.max'      => 'maximum surat adalah 5 MB',
            ])->validate();

            $suratFile      = $request->file('surat');
            $surat          = time() . '-' . $suratFile->getClientOriginalName();
            Storage::putFileAs('public/surat', $suratFile, $surat);

            $updateData['surat'] = $surat;
        }

        try {

            $izin->update($updateData);

            if($request->hasFile('surat')){
                if($oriSurat){
                    if(Storage::disk('local')->exists('public/surat/' . $oriSurat)){
                        Storage::delete('public/surat/' . $oriSurat);
                    }
                }
            }

            Alert::success('Mantap', 'Data berhasil diupdate');
            return redirect('/pegawai/izin');
        } catch (Exception $e) {
            if($request->hasFile('surat')){
                if($updateData->surat){
                    if(Storage::disk('local')->exists('public/surat/' . $oriSurat)){
                        Storage::delete('public/surat/' . $oriSurat);
                    }
                }
            }

            Alert::error('error', 'Terjadi Kesalahan');
            return redirect('/pegawai/izin');
        }
    }

    public function destroy($id)
    {
        try {

            $izin  = Izin::where('id', $id)->first();
            $surat = $izin->surat;

            if (!$izin) {
                Alert::error('Maaf', 'Data tidak ditemukan');
                return redirect('/pegawai/izin');
            }

            if($izin->pegawai_id != auth()->user()->id){
                Alert::error('Maaf', 'Data bukan milik anda');
                return redirect('/pegawai/izin');
            }

            $izin->delete();

            if($surat){
                if(Storage::disk('local')->exists('public/surat/' . $surat)){
                    Storage::delete('public/surat/' . $surat);
                }
            }

            Alert::success('Mantap', 'Data berhasil dihapus');
            return redirect('/pegawai/izin');
        } catch (Exception $e) {
            Alert::error('error', 'Terjadi Kesalahan');
            return redirect('/pegawai/izin');
        }
    }
}
