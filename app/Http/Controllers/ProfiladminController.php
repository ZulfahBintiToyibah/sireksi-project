<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfiladminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.profil-admin.profil');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.profil-admin.edit-profil', compact('user'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|max:255',
            'jenkel' => 'nullable|in:Laki-Laki,Perempuan',
            'email' => 'nullable|max:255',
            'alamat' => 'nullable|max:255',
            'no_telp' => 'nullable|max:255',
            'foto' => 'nullable|file|mimes:png,jpg,jpeg|max:1024',
        ]);

        // Update data user
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->jenkel = $request->jenkel;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_telp = $request->no_telp;


        // Cek jika ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Pindahkan file dari direktori temporary ke direktori penyimpanan
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('storage/foto-admin', $filename);
            $user->foto = $filename; // Simpan nama file foto ke database
        }

        // Simpan perubahan
        $user->save();

        return redirect()->route('profiladmin')->with('success', 'Data Berhasil Diedit!');
    }

    public function password(Request $request)
    {
        return view('admin.profil-admin.ubah-password'); 
    }

    public function updatePassword(Request $request)
{
    $request->validate([
        'password_lama' => 'nullable',
        'password_baru' => 'nullable|min:8|confirmed',
    ]);

    $user = Auth::user();

    // Jika password lama tidak kosong, lakukan validasi
    if ($request->filled('password_lama')) {
        // Periksa apakah password lama sesuai dengan yang ada di database
        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->with('error', 'Password lama salah');
        }
    }

    // Update password baru jika password baru diinput
    if ($request->filled('password_baru')) {
        // Update password
        $user->password = Hash::make($request->password_baru);
        $user->save();

        // Logout pengguna saat ini
        Auth::logout();

        // Redirect pengguna ke halaman login
        return redirect()->route('login')->with('success', 'Password berhasil diubah. Silakan login kembali.');
    }

    // Jika password lama kosong dan password baru kosong,
    // kembalikan pengguna dengan pesan bahwa tidak ada perubahan
    return back()->with('warning', 'Tidak ada perubahan password.');
}


}