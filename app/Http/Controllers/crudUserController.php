<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\crudUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class crudUserController extends Controller
{
    public function index(){
        return view('crudUser');
    }

    public function tampildatauser(){
        $data = User::all();
        return view('crudUser', compact('data'));
    }

    public function deletedatauser($id){
        // Pengecekan untuk ID tertentu yang tidak boleh dihapus
        if ($id == 32) {
            return redirect()->route('tampildatauser')->with('error', 'User ini merupakan Super Admin dan tidak dapat dihapus.');
        }
    
        $data = User::find($id);
        if (!$data) {
            return redirect()->route('tampildatauser')->with('error', 'User tidak ditemukan.');
        }
    
        $data->delete();
        return redirect()->route('tampildatauser')->with('success', 'Data Berhasil Di Hapus');
    }

    public function searchByUser(Request $request)
    {
        $keyword = $request->name;
        $data = DB::table('users')
                    ->where('name', 'LIKE', "%$keyword%")
                    ->get();
        return view('crudUser', compact('data'));
    }
}
?>
