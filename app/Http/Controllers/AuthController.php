<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(){
        return view ('auth.login');
    }

    public function processLogin(Request $request) {
    if ($request->type == "web") {
        if (auth()->guard('web')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return view('admin.dashboard');
        } else {
            return back()->withErrors([
                'message' => 'Invalid username or password.',
            ]);
        }
    } elseif ($request->type == "aslab") {
        if (auth()->guard('aslab')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return view('aslab.index');
        } else {
            return back()->withErrors([
                'message' => 'Invalid username or password.',
            ]);
        }
    } elseif ($request->type == "mahasiswa") {
        if (auth()->guard('mahasiswa')->attempt(['nim' =>$request->username, 'password' => $request->password])) {
            return view('mahasiswa.dashboard');
        } else {
            return back()->withErrors([
                'message' => 'Invalid username or password.',
            ]);
        }
    }
    
    // Jika tidak masuk ke salah satu kondisi di atas
    return back()->withErrors([
        'message' => 'Invalid authentication type.',
    ]);
}

}