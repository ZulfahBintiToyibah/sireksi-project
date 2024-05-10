<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Skripsi;
use App\Models\Pengumpulan;
use App\Models\Prodi;
use App\Models\Dosen;

class DashboardController extends Controller
{
    public function index()
    {
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
        return view('admin.dashboard', compact('totalSkripsi', 'totalSkripsiPGSD', 'totalSkripsiPBSI', 'totalSkripsiPIF', 'totalSkripsiPIPA', 'totalSkripsiPGPAUD', 'totalPengumpulan', 'totalDiajukan', 'totalDikonfirmasi', 'aslab', 'mahasiswa', 'totalProdi', 'totalDosen'));
    }

    public function index2(){
        $totalPengumpulan = Pengumpulan::count();
        $totalDiajukan = Pengumpulan::whereHas('skripsis', function ($query) {
            $query->where('status', 'Diajukan');
        })->count();

        $totalDikonfirmasi = Pengumpulan::whereHas('skripsis', function ($query) {
            $query->where('status', 'Dikonfirmasi');
        })->count();
        return view('aslab.dashboard', compact('totalPengumpulan', 'totalDiajukan', 'totalDikonfirmasi'))->with('success', 'Login berhasil');

    }
    
    public function index3(){
        return view('mahasiswa.dashboard');
    }

}