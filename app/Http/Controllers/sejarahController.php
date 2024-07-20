<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sejarah;
use Illuminate\Support\Facades\DB;

class sejarahController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = sejarah::where('tahunpemilu','LIKE','%' .$request->search.'%');
        }else{
            $data=DB::select('SELECT * FROM sejarahs');
            return view ('sejarah',compact('data'));
        } 
    }   
}