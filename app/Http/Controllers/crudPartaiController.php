<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\partai;
use App\Models\crudPartai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class crudPartaiController extends Controller
{
    public function index(){
        return $this->tampildata(); 
    }

    public function tampildata(){
        // Menggunakan LEFT JOIN untuk tetap menampilkan data partai meskipun data user telah dihapus
        $data = DB::table('partais')
                    ->leftJoin('users', 'partais.created_by', '=', 'users.id')
                    ->select('partais.*', 'users.name AS createdByUser')
                    ->get();

        $partaiOptions = DB::table('partais')
                    ->select('partai')
                    ->distinct()
                    ->get();
        return view('crudPartai', compact('data','partaiOptions'));
    }

    public function insertdata(Request $request)
    {
        // Tentukan warna berdasarkan status
        $statusColor = '';
        switch ($request->status) {
            case 'belum pemilihan':
                $statusColor = 'orange';
                break;
            case 'tidak terpilih':
                $statusColor = 'red';
                break;
            case 'terpilih':
                $statusColor = 'green';
                break;
            default:
                $statusColor = '';
        }

        // Dapatkan pengguna yang sedang login
        $user = Auth::user();

        // Simpan data partai termasuk warna status dan created_by
        $data = partai::create([
            'nourut' => $request->nourut,
            'partai' => $request->partai,
            'jenis' => $request->jenis,
            'foto' => $request->foto,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jeniskelamin' => $request->jeniskelamin,
            'agama' => $request->agama,
            'usia' => $request->usia,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'tahun' => $request->tahun,
            'created_by' => $user->name, // Gunakan nama pengguna yang sedang login
        ]);

        // Proses upload foto jika ada
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotocalon/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('crudPartai')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function getdata($id){
        $data = partai::find($id);
        if (!$data) {
            return redirect()->route('crudPartai')->with('error', 'Data tidak ditemukan.');
        }
        return view('editPartai', compact('data'));
    }

    public function updatedata(Request $request, $id) {
        $data = partai::find($id);
        if (!$data) {
            return redirect()->route('crudPartai')->with('error', 'Data tidak ditemukan.');
        }
        
        // Tentukan warna berdasarkan status
        $statusColor = $data->status_color; // Default to the existing color
    
        switch ($request->status) {
            case 'belum pemilihan':
                $statusColor = 'orange';
                break;
            case 'tidak terpilih':
                $statusColor = 'red';
                break;
            case 'terpilih':
                $statusColor = 'green';
                break;
        }
        
        // Update data partai termasuk warna status, kecuali foto
        $data->update([
            'nourut' => $request->nourut,
            'partai' => $request->partai,
            'jenis' => $request->jenis,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jeniskelamin' => $request->jeniskelamin,
            'agama' => $request->agama,
            'usia' => $request->usia,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'tahun' => $request->tahun
        ]);
        
        // Proses upload foto jika ada
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotocalon/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        
        return redirect()->route('crudPartai')->with('success', 'Data Berhasil Di Update');
    }
    
    public function deletedata($id){
        $data = partai::find($id);
        $data->delete();
        return redirect()->route('crudPartai')->with('success','Data Berhasil Di Hapus');
    }

    public function searchByName(Request $request)
{
    $keyword = $request->keyword;
    $partai = $request->partai;

    $query = DB::table('partais')
                ->leftJoin('users', 'partais.created_by', '=', 'users.id')
                ->select('partais.*', 'users.name AS createdByUser');

    if (!empty($keyword)) {
        $query->where('partais.nama', 'LIKE', "%$keyword%");
    }

    if (!empty($partai)) {
        $query->where('partais.partai', 'LIKE', "%$partai%");
    }

    $data = $query->get();

    // Ambil daftar kelurahan unik dari data
    $partaiOptions = DB::table('partais')
                        ->select('partai')
                        ->distinct()
                        ->get();

    return view('crudPartai', compact('data', 'partaiOptions'));
}

}
?>
