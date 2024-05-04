<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Prodi;

class DosenController extends Controller
{

    public function index(Request $request)
{
    $search = $request->input('search');
    $selectedProdis = (array) $request->input('prodis_id'); // Ensure $selectedProdis is always an array

    $dospems = Dosen::query();

    if ($search) {
        $dospems->where('nama', 'like', '%' . $search . '%')
            ->orWhere('nip', 'like', '%' . $search . '%');
    }

    if (!empty($selectedProdis)) {
        // Hanya ambil ID dari prodi yang dipilih
        $dospems->whereIn('prodis_id', $selectedProdis);
    }

    $result = $dospems->paginate(10);

    // Mengambil data Prodi hanya jika diperlukan, misalnya untuk menampilkan dropdown
    $prodis = Prodi::all();

    return view('admin.dosen_pembimbing.data-dospem', [
        'dospems' => $result, 
        'prodis' => $prodis, // Mengirimkan data prodi untuk dropdown
        'selectedProdis' => $selectedProdis, // Mengirimkan prodi yang dipilih untuk menandai opsi yang dipilih dalam dropdown
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