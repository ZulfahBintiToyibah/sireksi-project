<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use App\Models\Mahasiswa;
use App\Models\Skripsi;
use App\Models\Pengumpulan;
use App\Models\Prodi;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    
    public function login(){
        return view ('auth.login');
    }

    public function processLogin(Request $request) {
        $totalSkripsi = Skripsi::count();
        $totalSkripsiPGSD = Skripsi::whereHas('mahasiswas.prodis', function ($query) {
            $query->where('nama_prodi', 'PGSD');
        })->count();
        $totalSkripsiPBSI = Skripsi::whereHas('mahasiswas.prodis', function ($query) {
            $query->where('nama_prodi', 'PBSI');
        })->count();
        $totalSkripsiPIF = Skripsi::whereHas('mahasiswas.prodis', function ($query) {
            $query->where('nama_prodi', 'PIF');
        })->count();
        $totalSkripsiPIPA = Skripsi::whereHas('mahasiswas.prodis', function ($query) {
            $query->where('nama_prodi', 'PIPA');
        })->count();
        $totalSkripsiPGPAUD = Skripsi::whereHas('mahasiswas.prodis', function ($query) {
            $query->where('nama_prodi', 'PGPAUD');
        })->count();
        $totalPengumpulan = Pengumpulan::count();
        $totalDiajukan = Pengumpulan::whereHas('skripsis', function ($query) {
            $query->where('status', 'Diajukan');
        })->count();
        $totalDikonfirmasi = Pengumpulan::whereHas('skripsis', function ($query) {
            $query->where('status', 'Dikonfirmasi');
        })->count();
        $aslab = Mahasiswa::where('role', '1')->count(); // Count theses that are submitted
        $mahasiswa = Mahasiswa::where('role', '2')->count(); // Count theses that are submitted
        $totalProdi = Prodi::count();
        $totalDosen = Dosen::count();

        if ($request->role == "mahasiswa") {
            if (auth()->guard('mahasiswa')->attempt(['nim' => $request->username, 'password' => $request->password])) {
                // User is logged in
                if (auth()->guard('mahasiswa')->user()->role == 1) {
                    return view('aslab.dashboard', compact('totalPengumpulan', 'totalDiajukan', 'totalDikonfirmasi'))->with('success', 'Login berhasil');
                } else if (auth()->guard('mahasiswa')->user()->role == 2) {
                    $mahasiswa = auth()->guard('mahasiswa')->user();
                    Session::put('id', $mahasiswa->id);
                    Session::put('nim', $mahasiswa->nim);
                    Session::put('nama', $mahasiswa->nama);    
                    // Menampilkan SweetAlert
                    return view('mahasiswa.dashboard')->with('success', 'Login berhasil');
                }
            } else {
                // Menampilkan SweetAlert jika username atau password salah
                return back()->withInput()->with('error', 'Maaf Username atau password salah');
            }
        } elseif ($request->role == "admin") {
            if (auth()->guard('admin')->attempt(['username' =>$request->username, 'password' => $request->password])) {
                // Menampilkan SweetAlert
                return view('admin.dashboard', compact('totalSkripsi', 'totalSkripsiPGSD', 'totalSkripsiPBSI', 'totalSkripsiPIF', 'totalSkripsiPIPA', 'totalSkripsiPGPAUD', 'totalPengumpulan', 'totalDiajukan', 'totalDikonfirmasi', 'aslab', 'mahasiswa', 'totalProdi', 'totalDosen'))->with('success', 'Login berhasil');
            } else {
                // Menampilkan SweetAlert jika username atau password salah
                return back()->withInput()->with('error', 'Maaf Username atau password salah');
            }
        }
        // Menampilkan SweetAlert jika autentikasi gagal
        return back()->with('error', 'Autentikasi gagal');
    }
}
