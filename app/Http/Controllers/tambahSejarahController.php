<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sejarah;;
use Illuminate\Support\Facades\DB;

class tambahSejarahController extends Controller
{
    public function index(){
        return view('tambahSejarah');
    }


}
