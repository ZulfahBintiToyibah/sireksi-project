<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarirekomController extends Controller
{
    public function show(){
        return view('cari_rekomendasi.detail-rekom');
    }

    public function hasil(Request $request)
    {
        return view('cari_rekomendasi.hasil-rekom');
        // $scriptPath = public_path('pycript/coba.py');
        // $process = shell_exec("python $scriptPath");
        // return $process;
    }

}
