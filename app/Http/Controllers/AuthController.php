<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login(){
        return view ('auth.login');
    }

     public function processLogin(Request $request) {
        if ($request->role=="mahasiswa"){
            if (auth()->guard('mahasiswa')->attempt(['nim' => $request->username, 'password' => $request->password])) {
                // User is logged in
                if (auth()->guard('mahasiswa')->user()->role == 1) {
                    return view('aslab.dashboard');
                } 
                else if (auth()->guard('mahasiswa')->user()->role == 2){
                    $mahasiswa=auth()->guard('mahasiswa')->user();
                    Session::put('id', $mahasiswa->id);
                    Session::put('nim', $mahasiswa->nim);
                    Session::put('nama', $mahasiswa->nama);    
                    return view('mahasiswa.dashboard');
                }
            } 
        } elseif ($request->role == "admin"){
            if (auth()->guard('admin')->attempt(['username' =>$request->username, 'password' => $request->password])) {
                return view('admin.dashboard');
            }
        }
        dd('Autentikasi gagal');
    }
}
