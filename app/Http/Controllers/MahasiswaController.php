<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;

class MahasiswaController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $mahasiswas = Mahasiswa::where('nim', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('nama', 'LIKE', '%' . $request->search . '%')
                        ->paginate(5);
        }else {
            $mahasiswas = Mahasiswa::with('prodis')->paginate(5);
        }
        return view('admin.mahasiswa.data-mahasiswa', [
            'mahasiswas' => $mahasiswas
        ]);
    } 

    public function create(){
        $mahasiswas = Prodi::all();

        return view('admin.mahasiswa.create-mahasiswa', compact('mahasiswas'));
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'nim' => 'required|max:20',
            'nama' => 'required|max:255',
            'jenkel' => 'nullable|in:Laki-Laki,Perempuan',
            'prodis_id' => 'required|max:20',
            'no_telp' => 'nullable|max:255',
            'alamat' => 'nullable|max:255',
            'foto' => 'nullable|file|mimes:png,jpg,jpeg|max:1024',
        ]);
        
        // Set username (NIM) dan password
        $username = $request->nim;
        $password = bcrypt($request->nim);
        
        // Cek jika ada file foto yang diunggah
        if($request->hasFile('foto')){
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('storage/foto-mahasiswa', $filename);
        } else {
            // Jika tidak ada foto, set $filename ke null
            $filename = null;
        }
    
        // Buat entri Mahasiswa dengan data yang sudah diverifikasi
        Mahasiswa::create([
            'nim' => $username,
            'password' => $password, // Gunakan hashing untuk keamanan
            'nama' => $request->nama,
            'jenkel' => $request->jenkel,
            'prodis_id' => $request->prodis_id,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'foto' => $filename,// Simpan nama file foto atau null jika tidak ada foto      
        ]);
    
        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show($id){
        $mahasiswas = Mahasiswa::with('prodis')->find($id);
        $prodis = Prodi::all();

        return view('admin.mahasiswa.tampil-mahasiswa', compact('mahasiswas','prodis'));
    }

    public function edit(Request $request, $id){
        $mahasiswa = Mahasiswa::find($id);
    
        // Validasi input
        $validateData = $request->validate([
            'nim' => 'required|max:20',
            'nama' => 'required|max:255',
            'jenkel' => 'nullable|in:Laki-Laki,Perempuan',
            'prodis_id' => 'required|max:20',
            'no_telp' => 'nullable|max:255',
            'alamat' => 'nullable|max:255',
            'foto' => 'nullable|file|mimes:png,jpg,jpeg|max:1024',
        ]);
    
        // Update data mahasiswa
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->jenkel = $request->jenkel;
        $mahasiswa->prodis_id = $request->prodis_id;
        $mahasiswa->no_telp = $request->no_telp;
        $mahasiswa->alamat = $request->alamat;
        
    
        // Cek jika ada file foto yang diunggah
        if($request->hasFile('foto')){
            // Pindahkan file dari direktori temporary ke direktori penyimpanan
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('storage/foto-mahasiswa', $filename);
            $mahasiswa->foto = $filename; // Simpan nama file foto ke database
        }
    
        // Simpan perubahan
        $mahasiswa->save();
    
        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Diedit!');
    }
    
    public function detail($id){
        $mahasiswas = Mahasiswa::findOrFail($id); // Gunakan findOrFail untuk mengambil data mahasiswa berdasarkan ID
        
        return view('admin.mahasiswa.detail-mahasiswa', compact('mahasiswas'));
    }
    
    public function destroy($id){
        $mahasiswas = Mahasiswa::find($id);
        $mahasiswas->delete();
        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Dihapus!');
    }
}