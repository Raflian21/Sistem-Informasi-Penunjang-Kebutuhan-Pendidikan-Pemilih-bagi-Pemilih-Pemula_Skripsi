<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\konten;
use App\Models\crudKonten;
use Illuminate\Support\Facades\DB;

class kontenController extends Controller
{
    public function index(){
        return view('konten');
    }
    public function showdata(){
        $data = konten::all();
        return view ('konten',compact('data'));
    }
}
