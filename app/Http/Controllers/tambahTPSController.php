<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\map;
use App\Models\crudTPS;
use Illuminate\Support\Facades\DB;

class tambahTPSController extends Controller
{
    public function index(){
        return view('tambahTPS');
    }


}
