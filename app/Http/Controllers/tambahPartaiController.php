<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\partai;
use App\Models\crudPartai;
use Illuminate\Support\Facades\DB;

class tambahPartaiController extends Controller
{
    public function index(){
        return view('tambahPartai');
    }


}
