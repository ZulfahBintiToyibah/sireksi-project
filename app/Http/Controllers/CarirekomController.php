<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarirekomController extends Controller
{
    public function index(Request $request){
        return view('cari_rekomendasi.cari-rekom');
    }

    public function show($id){
        return view('cari_rekomendasi.detail-rekom');
    }


    public function hasil(Request $request)
    {
        $scriptPath = public_path('pycript/coba.py');
        $process = shell_exec("python $scriptPath");
        return $process;
    }

}
