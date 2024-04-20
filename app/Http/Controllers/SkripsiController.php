<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skripsi;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Kodeskripsi;

class SkripsiController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $skripsis = Skripsi::where('judul', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('tahun', 'LIKE', '%' . $request->search . '%')
                        ->paginate(5);
        }else {
            $skripsis = Skripsi::with('mahasiswas', 'dosens', 'kodeskripsis')->paginate(5);
        }
        return view('admin.skripsi.data-skripsi', [
            'skripsis' => $skripsis
        ]);
    } 

    public function create(){
        $skripsis = Skripsi::with('mahasiswas')->paginate(5);
        return view('admin.skripsi.create-skripsi', compact('skripsis'));
    }    

    public function store(Request $request){
        Dosen::create($request->all());
        return redirect()->route('dospem')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show($id){
        $dospems = Dosen::with('prodis')->find($id);
        $prodis = Prodi::all();

        return view('admin.dosen_pembimbing.tampil-dospem', compact('dospems','prodis'));
    }

    public function edit(Request $request, $id){
        $dospems = Dosen::find($id);
        $dospems->update($request->all());
        return redirect()->route('dospem')->with('success', 'Data Berhasil Diedit!');
    }

    public function destroy($id){
        $dospems = Dosen::find($id);
        $dospems->delete();
        return redirect()->route('dospem')->with('success', 'Data Berhasil Dihapus!');
    }
} 