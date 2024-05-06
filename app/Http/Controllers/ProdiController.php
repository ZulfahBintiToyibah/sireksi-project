<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function index(Request $request){

        $prodis = Prodi::all();
        return view('admin.prodi.data-prodi', compact('prodis'));
    }

    public function create(){
        return view('admin.prodi.create-prodi');
    }

    public function store(Request $request){
        Prodi::create($request->all());
        return redirect()->route('prodi')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show($id){
        $prodis = Prodi::find($id);

        return view('admin.prodi.tampil-prodi', compact('prodis'));
    }

    public function edit(Request $request, $id){
        $prodis = Prodi::find($id);
        $prodis->update($request->all());
        return redirect()->route('prodi')->with('success', 'Data Berhasil Diedit!');
    }

    public function destroy($id){
        $prodis = Prodi::find($id);
        $prodis->delete();
        return redirect()->route('prodi')->with('success', 'Data Berhasil Dihapus!');
    }
}