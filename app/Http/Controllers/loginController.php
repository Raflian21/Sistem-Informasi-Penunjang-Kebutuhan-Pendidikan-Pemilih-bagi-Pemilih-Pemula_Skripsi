<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Ambil pengguna berdasarkan username
        $user = User::where('username', $credentials['username'])->first();

        if ($user) {
            // Periksa password tanpa menggunakan Hash::check()
            if ($user->password === $credentials['password']) { // Periksa password langsung

                // Periksa apakah pengguna sudah diaktifkan
                if (!$user->is_active) {
                    return redirect()->route('login')->with('danger', 'Akun Anda belum diaktifkan. Harap tunggu aktivasi dari administrator.');
                }

                // Authentication passed...
                Auth::login($user);

                // Redirect ke dashboard jika pengguna dengan ID = 0
                if ($user->id === 0) {
                    return redirect()->route('dashboard');
                }
                
                return redirect()->intended(route('dashboard'))->with('success', 'Login Berhasil');
            }
        }

        // Jika autentikasi gagal
        return redirect()->route('login')->with('danger', 'Login Gagal! Silakan periksa username dan password Anda.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function activateUser($id)
    {
        // Cari pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Ubah status is_active menjadi true
        $user->is_active = true;
        $user->save();

        return redirect()->back()->with('success', 'Pengguna berhasil diaktifkan.');
    }

    public function deactivateUser($id)
    {
        // Cari pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Ubah status is_active menjadi false
        $user->is_active = false;
        $user->save();

        return redirect()->back()->with('success', 'Pengguna berhasil dinonaktifkan.');
    }
}
