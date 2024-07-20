<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\partai;
use Illuminate\Support\Facades\DB;

class viewController extends Controller
{
    public function index(){
        $data = partai::find($id);
        return view('view');
    }
}
