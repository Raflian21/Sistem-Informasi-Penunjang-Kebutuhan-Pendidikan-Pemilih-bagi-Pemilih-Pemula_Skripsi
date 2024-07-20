<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\map;
use App\Models\crudTPS;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class crudTPSController extends Controller
{
    public function index(){
        return $this->tampildataTPS(); 
    }
    public function tampildataTPS(){
        $data = DB::table('maps')
                    ->leftJoin('users', 'maps.created_by', '=', 'users.id')
                    ->select('maps.*', 'users.name AS createdByUser')
                    ->get();
    
        // Ambil daftar kelurahan unik dari data
        $kelurahanOptions = DB::table('maps')
                            ->select('kelurahan')
                            ->distinct()
                            ->get();
    
        return view('crudTPS', compact('data', 'kelurahanOptions'));
    }

    public function insertdataTPS(Request $request){
        $user = Auth::user();

        $data = map::create([
            'alamat' => $request->alamat,
            'notps' => $request->notps,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'totalpemilih' => $request->totalpemilih,
            'kelurahan' => $request->kelurahan,
            'created_by' => $user->name, // Mengambil ID pengguna yang sedang login
        ]);
        return redirect()->route('crudTPS')->with('success','Data Berhasil Ditambahkan');
    }
    public function getdataTPS($id){
        $data = map::find($id);
        if (!$data) {
            return redirect()->route('crudTPS')->with('error', 'Data tidak ditemukan.');
        }
        return view ('editTPS',compact('data'));
    }

    public function updatedataTPS(Request $request, $id){
        $data = map::find($id);
        if (!$data) {
            return redirect()->route('crudTPS')->with('error', 'Data tidak ditemukan.');
        }
        $data->update($request->all());
        return redirect()->route('crudTPS')->with('success','Data Berhasil Di Update');
    }
    public function deletedataTPS($id){
        $data = map::find($id);
        $data->delete();
        return redirect()->route('crudTPS')->with('success','Data Berhasil Di Hapus');
    }

    public function search(Request $request)
{
    $keyword = $request->keyword;
    $kelurahan = $request->kelurahan;

    $query = DB::table('maps')
                ->leftJoin('users', 'maps.created_by', '=', 'users.id')
                ->select('maps.*', 'users.name AS createdByUser');

    if (!empty($keyword)) {
        $query->where('maps.alamat', 'LIKE', "%$keyword%");
    }

    if (!empty($kelurahan)) {
        $query->where('maps.kelurahan', 'LIKE', "%$kelurahan%");
    }

    $data = $query->get();

    // Ambil daftar kelurahan unik dari data
    $kelurahanOptions = DB::table('maps')
                        ->select('kelurahan')
                        ->distinct()
                        ->get();

    return view('crudTPS', compact('data', 'kelurahanOptions'));
}

}
