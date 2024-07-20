<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\partai;
use App\Models\crudPartai;
use Illuminate\Support\Facades\DB;

class partaiController extends Controller
{
    public function index(){
        // $data=DB::select('SELECT * FROM partais');
        // return view ('partai',compact('data'));
        $data = partai::all();
        return view ('partai',compact('data'));
    }
    public function getdatapartai($id){
        $data = partai::find($id);
        return view ('view',compact('data'));
    }
}
