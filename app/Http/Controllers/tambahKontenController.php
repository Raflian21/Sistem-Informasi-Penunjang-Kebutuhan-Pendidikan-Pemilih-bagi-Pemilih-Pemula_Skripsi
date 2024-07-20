<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\konten;
use App\Models\crudKonten;
use Illuminate\Support\Facades\DB;

class tambahKontenController extends Controller
{
    public function index(){
        return view('tambahKonten');
    }
}
