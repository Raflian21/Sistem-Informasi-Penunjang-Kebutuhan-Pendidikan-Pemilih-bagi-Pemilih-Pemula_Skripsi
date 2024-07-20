<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crudKonten;
use App\Models\konten;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class crudKontenController extends Controller
{
    public function index(){
        return $this->tampildatakonten(); 
    }
    public function tampildatakonten(){
        $data = DB::table('kontens')
                    ->leftJoin('users', 'kontens.created_by', '=', 'users.id')
                    ->select('kontens.*', 'users.name AS createdByUser')
                    ->get();
        return view ('crudkonten',compact('data'));
    }
    
    public function insertdatakonten(Request $request){
        $request->validate([
            'video' => 'required|mimes:mp4,mov,avi|max:100000', // max size in KB (100MB)
        ]);

        // Dapatkan pengguna yang sedang login
        $user = Auth::user();

        $data = konten::create([
            'nama' => $request->nama,
            'video' => $request->video,
            'created_by' => $user->name, // Mengambil ID pengguna yang sedang login
        ]);


        if($request->hasFile('video')){
            $videoFile = $request->file('video');
            $videoFileName = $videoFile->getClientOriginalName();
            $videoFileSize = $videoFile->getSize(); // in bytes

            if ($videoFileSize > 100000000) { // max size in bytes (100MB)
                return redirect()->back()->withInput()->withErrors(['video' => 'Ukuran video melebihi batas maksimum (100MB).']);
            }

            $videoFile->move('kontenvideo/', $videoFileName);
            $data->video = $videoFileName;
            $data->save();
        }

        return redirect()->route('crudkonten')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function updatedatakonten(Request $request, $id){
        $request->validate([
            'video' => 'nullable|mimes:mp4,mov,avi|max:100000', // max size in KB (100MB)
        ]);

        $data = konten::find($id);
        if (!$data) {
            return redirect()->route('crudkonten')->with('error', 'Data tidak ditemukan.');
        }
        $data->update($request->all());

        if($request->hasFile('video')){
            $videoFile = $request->file('video');
            $videoFileName = $videoFile->getClientOriginalName();
            $videoFileSize = $videoFile->getSize(); // in bytes

            if ($videoFileSize > 100000000) { // max size in bytes (100MB)
                return redirect()->back()->withInput()->withErrors(['video' => 'Ukuran video melebihi batas maksimum (100MB).']);
            }

            $videoFile->move('kontenvideo/', $videoFileName);
            $data->video = $videoFileName;
            $data->save();
        }

        return redirect()->route('crudkonten')->with('success', 'Data Berhasil Di Update');
    }


    public function getdatakonten($id){
        $data = konten::find($id);
        if (!$data) {
            return redirect()->route('crudkonten')->with('error', 'Data tidak ditemukan.');
        }
        return view ('editKonten',compact('data'));
    }

    public function deletedatakonten($id){
        $data = konten::find($id);
        $data->delete();
        return redirect()->route('crudkonten')->with('success','Data Berhasil Di Hapus');
    }

    public function searchByNameKonten(Request $request)
    {
        $keyword = $request->nama;
        // Menggunakan LEFT JOIN untuk tetap menampilkan data konten meskipun data user telah dihapus
        $data = DB::table('kontens')
                    ->leftJoin('users', 'kontens.created_by', '=', 'users.id')
                    ->select('kontens.*', 'users.name AS createdByUser')
                    ->where('kontens.nama', 'LIKE', "%$keyword%")
                    ->get();
        return view('crudkonten', compact('data'));
    }
}
