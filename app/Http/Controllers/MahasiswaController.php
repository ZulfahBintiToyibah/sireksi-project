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
            'jenkel' => 'nullable|in:laki-laki,perempuan',
            'prodis_id' => 'required|max:20',
            'no_telp' => 'nullable|max:255',
            'alamat' => 'nullable|max:255',
            'foto' => 'nullable|file|mimes:png,jpg,jpeg|max:1024',
        ]);
        
        // Set username (NIM)
        $username = $request->nim;
        
        // Set password to NIM
        $password = $request->nim;
        
        // Cek apakah file foto telah diunggah
        if ($request->hasFile('foto')) {
            $filename = time() . random_int(100, 999) . '.' . $request->file('foto')->getClientOriginalExtension();
            // Simpan foto ke dalam direktori yang diinginkan
            $fotoPath = $request->file('foto')->storeAs('storage/z', $filename);
        
            // Simpan data ke dalam database dengan menyertakan path foto
            Mahasiswa::create([
                'nim' => $username,
                'password' => bcrypt($password), // Gunakan hashing untuk keamanan
                'nama' => $request->nama,
                'jenkel' => $request->jenkel,
                'prodis_id' => $request->prodis_id,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'foto' => $fotoPath,
            ]);
        } else {
            // Simpan data ke dalam database tanpa menyertakan foto
            Mahasiswa::create([
                'nim' => $username,
                'nama' => $request->nama,
                'jenkel' => $request->jenkel,
                'prodis_id' => $request->prodis_id,
                'password' => bcrypt($password), // Gunakan hashing untuk keamanan
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
            ]);
        }
    
        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show($id){
        $mahasiswas = Mahasiswa::with('prodis')->find($id);
        $prodis = Prodi::all();

        return view('admin.mahasiswa.tampil-mahasiswa', compact('mahasiswas','prodis'));
    }

    public function edit(Request $request, $id){
        $mahasiswas = Mahasiswa::find($id);
        $mahasiswas->update($request->all());
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