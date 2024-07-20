<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class PasswordController extends Controller
{
    public function index()
    {
        return view('password');
    }

    public function updatePassword(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:8', 'max:10', 'confirmed'],
        ], [
            'email.exists' => 'Email tidak terdaftar.',
            'email.email' => 'Harap masukkan email dengan benar (contoh: example@example.com)',
            'password.confirmed' => 'Password dan konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.max' => 'Password maksimal 10 karakter.',
        ]);

        // Jika validasi gagal, kembalikan dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // Cari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek apakah password baru sama dengan password yang sudah ada di akun lain di database
        $duplicatePasswordUser = User::where('password', $request->password)
                                     ->where('email', '!=', $request->email)
                                     ->first();
        
        if ($duplicatePasswordUser) {
            return redirect()->back()
                        ->withErrors(['password' => 'Password telah terdaftar di akun lain.'])
                        ->withInput();
        }

        // Update password tanpa hashing
        $user->password = $request->password;
        $user->save();

        // Jika tidak ada kesalahan, arahkan ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Password telah diperbaharui');
    }
}
