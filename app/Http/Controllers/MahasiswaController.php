<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $mahasiswas = Mahasiswa::all();

        return view('admin.mahasiswa.data-mahasiswa',  compact('mahasiswas'));
    }

    public function index2(Request $request)
    {
        $mahasiswas = Mahasiswa::all();

        return view('admin.laporan.laporan-user',  compact('mahasiswas'));
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
            'role' => 'required|max:11',
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
            'role' => $request->role,      
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
            'role' => 'required|max:11',
        ]);
    
        // Update data mahasiswa
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->jenkel = $request->jenkel;
        $mahasiswa->prodis_id = $request->prodis_id;
        $mahasiswa->no_telp = $request->no_telp;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->role = $request->role;
        
    
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

    public function index_profil(Request $request)
    {
        return view('profil-mhs.profil');
    }

    public function show_profil($id)
    
    {
        $mahasiswa = Mahasiswa::with('prodis')->find($id);

        // Cek apakah variabel $prodis sudah terdefinisi
        if (!isset($prodis)) {
            // Jika belum, maka ambil data Prodi
            $prodis = Prodi::all();
        }        
        return view('profil-mhs.edit-profil', compact('mahasiswa','prodis'));
    }

    public function edit_profil(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $validateData = $request->validate([
            'nim' => 'required|max:20',
            'nama' => 'required|max:255',
            'jenkel' => 'nullable|in:Laki-Laki,Perempuan',
            'prodis_id' => 'required|max:20',
            'no_telp' => 'nullable|max:255',
            'alamat' => 'nullable|max:255',
            'foto' => 'nullable|file|mimes:png,jpg,jpeg|max:1024',
        ]);

        // Update data Mahasiswa
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->jenkel = $request->jenkel;
        $mahasiswa->prodis_id = $request->prodis_id;
        $mahasiswa->no_telp = $request->no_telp;
        $mahasiswa->alamat = $request->alamat;

        // Cek jika ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Pindahkan file dari direktori temporary ke direktori penyimpanan
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('storage/foto-mahasiswa', $filename);
            $mahasiswa->foto = $filename; // Simpan nama file foto ke database
        }

        // Simpan perubahan
        $mahasiswa->save();

        return redirect()->route('my-profil')->with('success', 'Data Berhasil Diedit!');
    }

    public function password_change(Request $request)
    {
        return view('profil-mhs.ubah-password'); 
    }

    public function update_Password(Request $request)
{
    $request->validate([
        'password_lama' => 'nullable',
        'password_baru' => 'required|confirmed',
    ]);

    $mahasiswa = auth()->guard('mahasiswa')->user();

    // Jika password lama tidak kosong, lakukan validasi
    if ($request->filled('password_lama')) {
        // Periksa apakah password lama sesuai dengan yang ada di database
        if (!Hash::check($request->password_lama, $mahasiswa->password)) {
            return back()->with('error', 'Password lama salah');
        }
    }

        // Update password baru jika password baru diinput
        if ($request->filled('password_baru')) {
        // Update password
        $mahasiswa->password = Hash::make($request->password_baru);
        $mahasiswa->save();

        // Logout pengguna saat ini
        Auth::guard('mahasiswa')->logout();

        // Redirect pengguna ke halaman login
        return redirect()->route('login')->with('success', 'Password berhasil diubah. Silakan login kembali.');
    }

    // Jika password lama kosong dan password baru kosong,
    // kembalikan pengguna dengan pesan bahwa tidak ada perubahan
    return back()->with('warning', 'Tidak ada perubahan password.');
}
}