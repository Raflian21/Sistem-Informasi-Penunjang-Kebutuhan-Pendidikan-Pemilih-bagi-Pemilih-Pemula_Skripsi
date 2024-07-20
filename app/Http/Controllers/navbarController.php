<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class navbarController extends Controller
{
    public function index(){
        return view('navbar');
    }
}
