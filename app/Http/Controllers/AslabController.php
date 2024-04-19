<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aslab;

class AslabController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $aslabs = Aslab::where('nama', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('username', 'LIKE', '%' . $request->search . '%')
                        ->paginate(5);
        }else {
            $aslabs = Aslab::paginate(5);
        }
        return view('admin.aslab.data-aslab', [
            'aslabs' => $aslabs
        ]);
    } 

    public function create(){
        return view('admin.aslab.create-aslab');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|max:255',
            'jenkel' => 'nullable|in:Laki-Laki,Perempuan',
            'email' => 'nullable|max:255',
            'jabatan' => 'nullable|max:255',
            'foto' => 'nullable|file|mimes:png,jpg,jpeg|max:1024',
        ]);
        
        // Set username (NIM) dan password
        $password = bcrypt($request->username);
        
        // Cek jika ada file foto yang diunggah
        if($request->hasFile('foto')){
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('storage/foto-aslab', $filename);
        } else {
            // Jika tidak ada foto, set $filename ke null
            $filename = null;
        }
    
        // Buat entri Aslab dengan data yang sudah diverifikasi
        Aslab::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $password, // Gunakan hashing untuk keamanan
            'jenkel' => $request->jenkel,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'foto' => $filename,// Simpan nama file foto atau null jika tidak ada foto      
        ]);
    
        return redirect()->route('aslab')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show($id){
        $aslabs = Aslab::find($id);

        return view('admin.aslab.tampil-aslab', compact('aslabs'));
    }

    public function edit(Request $request, $id){
    $aslabs = Aslab::find($id);

    // Validasi input
    $validateData = $request->validate([
        'nama' => 'required|max:255',
        'username' => 'required|max:255',
        'jenkel' => 'nullable|in:Laki-Laki,Perempuan',
        'email' => 'nullable|max:255',
        'jabatan' => 'nullable|max:255',
        'foto' => 'nullable|file|mimes:png,jpg,jpeg|max:1024',
    ]);

    // Update data Aslab
    $aslabs->nama = $request->nama;
    $aslabs->username = $request->username;
    $aslabs->jenkel = $request->jenkel;
    $aslabs->email = $request->email;
    $aslabs->jabatan = $request->jabatan;

    // Cek apakah ada file foto yang diunggah
    if($request->hasFile('foto')){
        // Pindahkan file dari direktori temporary ke direktori penyimpanan
        $filename = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move('storage/foto-aslab', $filename);
        $aslabs->foto = $filename; // Simpan nama file foto ke database
    }

    // Simpan perubahan
    $aslabs->save();

    return redirect()->route('aslab')->with('success', 'Data Berhasil Diedit!');
}

    public function detail($id){
        $aslabs = Aslab::findOrFail($id); // Gunakan findOrFail untuk mengambil data aslab berdasarkan ID
        
        return view('admin.aslab.detail-aslab', compact('aslabs'));
    }
    
    public function destroy($id){
        $aslab = Aslab::find($id);
    
        if (!$aslab) {
            return redirect()->route('aslab')->with('error', 'Data tidak ditemukan.');
        }
    
        $aslab->delete();
    
        return redirect()->route('aslab')->with('success', 'Data Berhasil Dihapus!');
    }
    
}


