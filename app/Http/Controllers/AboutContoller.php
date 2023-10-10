<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutContoller extends Controller
{
    //
    public function about(){
        return view('home');
    }
}
