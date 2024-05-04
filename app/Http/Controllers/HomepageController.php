<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function beranda(Request $request){
        return view('home-page.index');
    }

    public function informasi(Request $request){
        return view('home-page.informasi');
    }
}
