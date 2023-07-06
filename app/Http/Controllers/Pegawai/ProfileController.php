<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function get()
    {
        $uid = auth()->user()->id;
        $profile = User::where('id', $uid)->get();

        return view('pegawai.profile.show', compact('profile'));
    }

    public function post(Request $request)
    {
        $id = auth()->user()->id;
        $pegawai = User::where('id', $id)->first();
        if(!$pegawai){
            alert()->error('Maaf', 'Data tidak ditemukan');
            return redirect('/pegawai/profile');
        }

        $updateData = [
            'name' => $request->name,
            'telp' => $request->telp,
            'gender' => $request->gender,
            'domisili' => $request->domisili,
        ];

        if($request->email) :

            $rules = [
                'email' => 'email|unique:users,email',
            ];

            Validator::make($request->all(), $rules, $messages =
            [
                'email.email' => 'format email salah',
                'email.unique' => 'email sudah digunakan user lain',
            ])->validate();

            $updateData['email'] = $request->email;
        endif;

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
        return redirect('/pegawai/profile');
    }
}
