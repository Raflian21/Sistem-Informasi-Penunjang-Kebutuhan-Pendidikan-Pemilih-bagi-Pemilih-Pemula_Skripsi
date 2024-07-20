<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data user dari session
        $user = $request->session()->get('user');
        
        // Jika user ada, kirimkan data ke view dashboard
        if ($user) {
            return view('dashboard', [
                'nama' => $user->name,
                'foto' => $user->foto,
            ]);
        } else {
            // Jika tidak ada user, kirimkan data kosong (opsional)
            return view('dashboard', [
                'nama' => null,
                'foto' => null,
            ]);
        }
    }
}
