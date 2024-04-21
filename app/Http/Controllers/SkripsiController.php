<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skripsi;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Kodeskripsi;

class SkripsiController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $skripsis = Skripsi::where('judul', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('tahun', 'LIKE', '%' . $request->search . '%')
                        ->paginate(10);
        }else {
            $skripsis = Skripsi::with('mahasiswas', 'dosens', 'kodeskripsis')->paginate(10);
        }
        return view('admin.skripsi.data-skripsi', [
            'skripsis' => $skripsis
        ]);
    } 

    public function show($id){
        $skripsis = Skripsi::with('mahasiswas', 'dosens', 'kodeskripsis')->find($id);
        $mahasiswas = Mahasiswa::all();
        $prodis = Prodi::all();
        $dosens = Dosen::all();
        $kodeskripsis = Kodeskripsi::all();
    
        return view('admin.skripsi.tampil-skripsi', compact('skripsis', 'mahasiswas', 'dosens', 'kodeskripsis', 'prodis'));
    }
    

    public function edit(Request $request, $id){
        $skripsis = Skripsi::find($id);
        $skripsis->update($request->all());
        return redirect()->route('skripsi')->with('success', 'Data Berhasil Diedit!');
    }

    public function detail($id){
        $skripsis = Skripsi::findOrFail($id); // Gunakan findOrFail untuk mengambil data mahasiswa berdasarkan ID
        
        return view('admin.skripsi.detail-skripsi', compact('skripsis'));
    }

    public function destroy($id){
        $skripsis = Skripsi::find($id);
        $skripsis->delete();
        return redirect()->route('skripsi')->with('success', 'Data Berhasil Dihapus!');
    }
} 