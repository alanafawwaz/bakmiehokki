<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PegawaiRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PegawaiController extends Controller
{

    public function index()
    {
        $pegawais = User::select(
                                'id', 'name', 'username', 'telp', 'type',
                                'gender', 'posisi', 'domisili'
                            )
                            ->where('role', 'pegawai')
                            ->orderBy('id', 'desc')
                            ->paginate(5);

        return view('admin.pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        return view('admin.pegawai.create');
    }

    public function store(PegawaiRequest $request)
    {
        $rules = [
            'password' => 'required|max:8',
            'username' => 'required|max:50|unique:users,username',
        ];

        Validator::make($request->all(), $rules, $messages =
        [
            'username.required' => 'username harus diisi',
            'username.max' => 'maximal username 50 karakter',
            'username.unique' => 'username sudah digunakan user lain',
            'password.required' => 'password harus diisi',
            'password.max' => 'maximal password 8 karakter',
        ])->validate();

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'telp' => $request->telp,
            'role' => 'pegawai',
            'type' => $request->type,
            'gender' => $request->gender,
            'posisi' => $request->posisi,
            'domisili' => $request->domisili,
            'password' => bcrypt($request->password),
        ]);

        alert()->success('Mantap', 'Data berhasil ditambahkan');
        return redirect('/admin/pegawai');
    }

    public function edit($id)
    {
        $pegawai = User::where('id', $id)->first();
        if(!$pegawai){
            alert()->error('Maaf', 'Data tidak ditemukan');
            return redirect('/admin/pegawai');
        }

        return view('admin.pegawai.edit', compact('pegawai'));
    }

    public function update(PegawaiRequest $request, $id)
    {
        $pegawai = User::where('id', $id)->first();
        if(!$pegawai){
            alert()->error('Maaf', 'Data tidak ditemukan');
            return redirect('/admin/pegawai');
        }

        $updateData = [
            'name' => $request->name,
            'telp' => $request->telp,
            'role' => 'pegawai',
            'type' => $request->type,
            'gender' => $request->gender,
            'posisi' => $request->posisi,
            'domisili' => $request->domisili,
        ];

        if($request->username) :

            $rules = [
                'username' => 'max:50|unique:users,username',
            ];

            Validator::make($request->all(), $rules, $messages =
            [
                'username.max' => 'maximal username 50 karakter',
                'username.unique' => 'username sudah digunakan user lain',
            ])->validate();

            $updateData['username'] = $request->username;
        endif;

        if($request->password) :

            $rules = [
                'password' => 'required|max:8',
            ];

            Validator::make($request->all(), $rules, $messages =
            [
                'password.required' => 'password harus diisi',
                'password.max' => 'maximal password 8 karakter',
            ])->validate();

            $updateData['password'] = bcrypt($request->password);
        endif;

        $pegawai->update($updateData);

        alert()->success('Mantap', 'Data berhasil diupdate');
        return redirect('/admin/pegawai');
    }

    public function destroy($id)
    {
        $pegawai = User::where('id', $id)->first();
        if(!$pegawai){
            alert()->error('Maaf', 'Data tidak ditemukan');
            return redirect('/admin/pegawai');
        }

        $pegawai->delete();

        alert()->success('Mantap', 'Data berhasil dihapus');
        return redirect('/admin/pegawai');
    }
}
