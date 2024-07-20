<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sejarah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class crudSejarahController extends Controller
{
    public function index(){
        return $this->tampildatasejarah();
    }
    public function tampildatasejarah()
{
    $data = DB::table('sejarahs')
        ->leftJoin('users', 'sejarahs.created_by', '=', 'users.id')
        ->select('sejarahs.*', 'users.name AS createdByUser')
        ->get();

    $tahun_pemilu = DB::table('sejarahs')
        ->select('tahunpemilu')
        ->distinct()
        ->orderBy('tahunpemilu', 'desc')
        ->pluck('tahunpemilu');

    return view('crudsejarah', compact('data', 'tahun_pemilu'));
}
    // public function insertdata(Request $request){
    //     $data=partai::create($request->all());
    //     if($request->hasFile('partai')){
    //         $request->file('partai')->move('fotopartai/', $request->file('partai')->getClientOriginalName());
    //         $data->partai = $request->file('partai')->getClientOriginalName();
    //         $data->save();
    //     }
    // }
    public function insertdatasejarah(Request $request){
        $user = Auth::user();

        $data = sejarah::create([
            'jenis' => $request->jenis,
            'tahunpemilu' => $request->tahunpemilu,
            'jumlahpartai' => $request->jumlahpartai,
            'totalsuara' => $request->totalsuara,
            'suaradimenangkan' => $request->suaradimenangkan,
            'presiden' => $request->presiden,
            'wakilpresiden' => $request->wakilpresiden,
            'foto' => $request->foto,
            'linkpartai' => $request->linkpartai,
            'created_by' => $user->name, // Mengambil ID pengguna yang sedang login
        ]);

        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopartai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('crudsejarah')->with('success','Data Berhasil Ditambahkan');
    }

    public function getdatasejarah($id){
        $data = sejarah::find($id);
        if (!$data) {
            return redirect()->route('crudsejarah')->with('error', 'Data tidak ditemukan.');
        }
        return view ('editSejarah',compact('data'));
    }

    public function updatedatasejarah(Request $request, $id){
        $data = sejarah::find($id);
        if (!$data) {
            return redirect()->route('crudsejarah')->with('error', 'Data tidak ditemukan.');
        }
        $data->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopartai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('crudsejarah')->with('success','Data Berhasil Di Update');
    }

    public function deletedatasejarah($id){
        $data = sejarah::find($id);
        $data->delete();
        return redirect()->route('crudsejarah')->with('success','Data Berhasil Di Hapus');
    }

    public function searchByTahun(Request $request)
{
    $tahunpemilu = $request->input('tahunpemilu');

    $data = DB::table('sejarahs')
        ->where('tahunpemilu', $tahunpemilu)
        ->leftJoin('users', 'sejarahs.created_by', '=', 'users.id')
        ->select('sejarahs.*', 'users.name AS createdByUser')
        ->get();

    $tahun_pemilu = DB::table('sejarahs')
        ->select('tahunpemilu')
        ->distinct()
        ->orderBy('tahunpemilu', 'desc')
        ->pluck('tahunpemilu');

    return view('crudsejarah', compact('data', 'tahun_pemilu'));
}
}
