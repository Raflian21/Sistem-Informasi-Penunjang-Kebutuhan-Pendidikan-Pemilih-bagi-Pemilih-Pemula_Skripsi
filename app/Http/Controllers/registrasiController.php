<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class registrasiController extends Controller
{
    public function index() {
        return view('registrasi');
    }

    public function insertdataregister(Request $request) {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'foto' => 'required',
            'email' => ['required', 'email', 'unique:users,email'], // unique rule untuk email
            'username' => 'required|max:8|unique:users,username', // unique rule untuk username
            'password' => 'required|min:8|max:10|unique:users,password'
        ], [
            'username.max' => 'Username maksimal 8 karakter.',
            'password.max' => 'Password maksimal 10 karakter.',
            'password.min' => 'Password minimal 8 karakter.', // Pesan kustom untuk rule 'min'
            'email.unique' => 'Email telah terdaftar.',
            'username.unique' => 'Username telah terdaftar.',
            'password.unique' => 'Password telah terdaftar.',
            'email.email' => 'Harap masukkan email dengan benar (contoh: example@example.com)' // Pesan kustom untuk rule 'email'
        ]);

        // Jika validasi gagal, kembalikan dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // Jika tidak ada kesalahan, buat pengguna baru
        $data = User::create([
            'name' => $request->name,
            'foto' => $request->foto,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password // Simpan password tanpa hashing
        ]);

        // Proses upload foto
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotoregister/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        // Jika tidak ada kesalahan, arahkan ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi Berhasil');
    }
}
?>
