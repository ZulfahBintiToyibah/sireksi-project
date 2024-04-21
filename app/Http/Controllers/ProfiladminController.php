<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Import namespace untuk kelas Auth

use Illuminate\Http\Request;

class ProfiladminController extends Controller
{
    public function index(Request $request){
        // Mengambil data profil admin yang sedang login
        $user = Auth::user();
        
        // Memeriksa apakah user ada sebelum mengakses properti 'foto'
        if ($user) {
            return view('admin.profil-admin.profil', compact('user')); // Mengirimkan variabel $user ke view
        } else {
            // Jika user tidak ditemukan, mungkin Anda ingin menangani ini dengan cara lain
            // Misalnya, arahkan pengguna ke halaman tertentu dengan pesan kesalahan
            return redirect()->back()->with('error', 'Profil tidak ditemukan');
        }
    }
    
    
    public function edit(Request $request, $id){
        $user = User::find($id);
    
        // Validasi input
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|max:255',
            'jenkel' => 'nullable|in:Laki-Laki,Perempuan',
            'email' => 'required|max:255',
            'foto' => 'nullable|file|mimes:png,jpg,jpeg|max:1024',
        ]);
    
        // Update data user
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->jenkel = $request->jenkel;
        $user->email = $request->email;

        // Cek jika ada file foto yang diunggah
        if($request->hasFile('foto')){
            // Pindahkan file dari direktori temporary ke direktori penyimpanan
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('storage/foto-admin', $filename);
            $user->foto = $filename; // Simpan nama file foto ke database
        }
    
        // Simpan perubahan
        $user->save();
    
        return redirect()->route('profiladmin')->with('success', 'Data Berhasil Diedit!');
    }
}
