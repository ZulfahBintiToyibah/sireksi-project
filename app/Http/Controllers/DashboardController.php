<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Skripsi;
use App\Models\Prodi;
use App\Models\Dosen;

class DashboardController extends Controller
{
    public function index()
{
    // $totalAslab = Mahasiswa::where('role', '1')->count(); // Hitung jumlah total Asisten Laboratorium
    // $totalMahasiswa = Mahasiswa::where('role', '2')->count(); // Hitung jumlah total Mahasiswa
    // $totalSkripsi = Skripsi::count();
    // $totalProgramStudi = Prodi::count();
    // $totalDosenPembimbing = Dosen::count();

    return view('admin.dashboard');
}

    public function index2(){
        // $totalSkripsi = Skripsi::where('status', 'Diajukan')->count(); // Hitung jumlah total Asisten Laboratorium

        return view('aslab.dashboard');
    
    }

    public function index3(){
        return view('mahasiswa.dashboard');

    }

}