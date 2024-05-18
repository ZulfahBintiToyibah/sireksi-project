<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skripsi;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Kodeskripsi;
use App\Models\Pengumpulan;


class SkripsiController extends Controller
{    
    public function index(Request $request)
{
    $skripsis = Skripsi::all();
    return view('admin.skripsi.data-skripsi',compact('skripsis'));
}
    public function show($id){
        $skripsis = Skripsi::with('mahasiswas', 'dosens', 'kodeskripsis')->find($id);
        $mahasiswas = Mahasiswa::all();
        $prodis = Prodi::all();
        $dosens = Dosen::all();
        $kodeskripsis = Kodeskripsi::all();
    
        return view('admin.skripsi.tampil-skripsi', compact('skripsis', 'mahasiswas', 'dosens', 'kodeskripsis', 'prodis'));
    }

    public function edit(Request $request, $id){
        $skripsis = Skripsi::find($id);
        $skripsis->update($request->all());
        return redirect()->route('skripsi')->with('success', 'Data Berhasil Diedit!');
    }

    public function detail($id){
        $skripsis = Skripsi::findOrFail($id); // Gunakan findOrFail untuk mengambil data mahasiswa berdasarkan ID
        
        return view('admin.skripsi.detail-skripsi', compact('skripsis'));
    }

    public function destroy($id){
        $skripsis = Skripsi::find($id);
        $skripsis->delete();
        return redirect()->route('skripsi')->with('success', 'Data Berhasil Dihapus!');
    }

    public function create(){
        $skripsis = Skripsi::with('mahasiswas', 'dosens', 'kodeskripsis');
        $mahasiswas = Mahasiswa::all();
        $prodis = Prodi::all();
        $dosens = Dosen::all();
        $kodeskripsis = Kodeskripsi::all();

        return view('mahasiswa.pengumpulan.submit_skripsi', compact('skripsis', 'mahasiswas', 'dosens', 'kodeskripsis', 'prodis'));
    }
    
    public function submitSkripsi(Request $request)
{
    // Validasi data yang dikirim dari form
    $request->validate([
        'judul' => 'required',
        'tahun' => 'required|integer',
        'abstrak' => 'required',
        'kodeskripsis_id' => 'required|exists:kodeskripsis,id', // Pastikan kodeskripsis_id ada di tabel kodeskripsis
    ]);

    // Cek apakah skripsi sudah diajukan atau sudah dikonfirmasi
    $skripsi = Skripsi::where('mahasiswas_id', $request->mahasiswa_id)
    ->whereIn('status', ['Diajukan', 'Dikonfirmasi'])
    ->first();

    if ($skripsi) {
    // Jika sudah diajukan atau sudah dikonfirmasi, arahkan ke halaman detail pengumpulan dengan pesan peringatan
    return redirect()->route('detail-pengumpulan', ['id' => $skripsi->id])->with('warning', 'Anda sudah mengumpulkan atau telah dikonfirmasi skripsi sebelumnya.');
    }

    // Buat skripsi baru
    $skripsi = Skripsi::create([
        'mahasiswas_id' => $request->mahasiswa_id, // Mendapatkan ID mahasiswa yang sedang login
        'judul' => $request->judul,
        'tahun' => $request->tahun,
        'dosens_id' => $request->dosens_id, // Anda perlu menyesuaikan ini dengan logika aplikasi Anda
        'abstrak' => $request->abstrak,
        'kodeskripsis_id' => $request->kodeskripsis_id,
        'status' => 'Diajukan',
    ]);

    // Simpan informasi pengumpulan skripsi
    Pengumpulan::create([
        'skripsis_id' => $skripsi->id,
    ]);

    // // Redirect dengan pesan sukses
    // return redirect()->back()->with('success', 'Skripsi berhasil diajukan.');
    // // Redirect ke halaman detail skripsi yang baru saja dibuat
    return redirect()->route('detail-pengumpulan', ['id' => $skripsi->id])->with('success', 'Skripsi berhasil diajukan, selanjutnya tunggu konfirmasi dari Asisten Laboratorium');}

    // Metode untuk mengkonfirmasi skripsi
    public function confirmSkripsi(Request $request)
{
    // Validasi request
    $request->validate([
        'skripsi_id' => 'required|exists:skripsis,id',
    ]);

    try {
        // Temukan skripsi berdasarkan ID
        $skripsi = Skripsi::findOrFail($request->skripsi_id);

        // Ubah status skripsi menjadi "Dikonfirmasi"
        $skripsi->status = 'Dikonfirmasi';
        $skripsi->save();

        $pengumpulans = Pengumpulan::where('skripsis_id', $request->skripsi_id);
        $pengumpulans->mahasiswas_id = auth()->guard('mahasiswa')->user()->id;
        $pengumpulans->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Skripsi berhasil dikonfirmasi');
    } catch (\Exception $e) {
        // Tangani kesalahan jika skripsi tidak ditemukan atau operasi tidak berhasil
        return redirect()->back()->with('error', 'Gagal mengkonfirmasi skripsi: ' . $e->getMessage());
    }
}


public function detailpengumpulan($id){
    $skripsis = Skripsi::with('mahasiswas', 'dosens', 'kodeskripsis')->findOrFail($id);    
    $mahasiswas = Mahasiswa::all();
    $pengumpulans = Pengumpulan::all();
    $prodis = Prodi::all();
    $dosens = Dosen::all();
    $kodeskripsis = Kodeskripsi::all();

    return view('mahasiswa.pengumpulan.kumpul_skripsi', compact('skripsis', 'mahasiswas', 'dosens', 'pengumpulans','kodeskripsis', 'prodis'));
}

} 