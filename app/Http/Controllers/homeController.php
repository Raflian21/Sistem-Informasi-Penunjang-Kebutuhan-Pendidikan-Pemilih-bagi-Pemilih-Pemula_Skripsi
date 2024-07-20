<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\home;
use App\Models\users;

class homeController extends Controller
{
    public function index(){
        return view('home');
    }
    
}
