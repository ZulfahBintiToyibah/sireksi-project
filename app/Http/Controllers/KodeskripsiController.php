<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kodeskripsi;

class KodeskripsiController extends Controller
{
    public function index(Request $request){
        $kodeskripsis = Kodeskripsi::all();
        return view('admin.kode_skripsi.data-kode', compact('kodeskripsis'));
    } 

    public function create(){
        return view('admin.kode_skripsi.create-kode');
    }

    public function store(Request $request){
        Kodeskripsi::create($request->all());
        return redirect()->route('kodeskripsi')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show($id){
        $kodeskripsis = Kodeskripsi::find($id);

        return view('admin.kode_skripsi.tampil-kode', compact('kodeskripsis'));
    }

    public function edit(Request $request, $id){
        $kodeskripsis = Kodeskripsi::find($id);
        $kodeskripsis->update($request->all());
        return redirect()->route('kodeskripsi')->with('success', 'Data Berhasil Diedit!');
    }

    public function destroy($id){
        $kodeskripsis = Kodeskripsi::find($id);
        $kodeskripsis->delete();
        return redirect()->route('kodeskripsi')->with('success', 'Data Berhasil Dihapus!');
    }
}