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
        $totalSkripsi = Skripsi::count();
        $diajukan = Skripsi::where('status', 'Diajukan')->count(); // Count theses that are submitted
        $dikonfirmasi = Skripsi::where('status', 'Dikonfirmasi')->count(); // Count theses that are confirmed
        $aslab = Mahasiswa::where('role', '1')->count(); // Count theses that are submitted
        $mahasiswa = Mahasiswa::where('role', '2')->count(); // Count theses that are submitted
        $totalProdi = Prodi::count();
        $totalDosen = Dosen::count();
        return view('admin.dashboard', compact('totalSkripsi', 'diajukan', 'dikonfirmasi', 'aslab', 'mahasiswa', 'totalProdi', 'totalDosen'));
    }

    public function index2(){
        $totalSkripsi = Skripsi::count();
        $diajukan = Skripsi::where('status', 'Diajukan')->count(); // Count theses that are submitted
        $dikonfirmasi = Skripsi::where('status', 'Dikonfirmasi')->count(); // Count theses that are confirmed
        $aslab = Mahasiswa::where('role', '1')->count(); // Count theses that are submitted
        $mahasiswa = Mahasiswa::where('role', '2')->count(); // Count theses that are submitted
        $totalProdi = Prodi::count();
        $totalDosen = Dosen::count();
        return view('aslab.dashboard', [
            'totalSkripsi' => $totalSkripsi,
            'diajukan' => $diajukan,
            'dikonfirmasi' => $dikonfirmasi,
            'aslab' => $aslab,
            'mahasiswa' => $mahasiswa,
            'totalProdi' => $totalProdi,
            'totalDosen' => $totalDosen,
        ]);
    }
    

    public function index3(){
        return view('mahasiswa.dashboard');

    }

}