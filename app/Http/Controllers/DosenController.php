<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Prodi;

class DosenController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $dospems = Dosen::where('nip', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('nama', 'LIKE', '%' . $request->search . '%')
                        ->paginate(5);
        }else {
            $dospems = Dosen::with('prodis')->paginate(5);
        }
        return view('admin.dosen_pembimbing.data-dospem', [
            'dospems' => $dospems
        ]);
    } 

    public function create(){
        $dospems = Prodi::all();
        return view('admin.dosen_pembimbing.create-dospem', compact('dospems'));
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