<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\map;


class mapController extends Controller
{
    public function getTps() {
        $data = map::all();
        return view ('map',compact('data'));
    }
    public function index(){
        return view('map');
    }
}
