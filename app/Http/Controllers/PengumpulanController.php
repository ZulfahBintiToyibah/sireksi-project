<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumpulan;
use App\Models\Mahasiswa;
use App\Models\Skripsi;


class PengumpulanController extends Controller
{
    protected $table = 'pengumpulans';
    protected $fillable = ['mahasiswas_id', 'skripsis_id'];
    public function index(Request $request){
        if($request->has('search')){
            $pengumpulans = Pengumpulan::join('mahasiswas', 'pengumpulans.mahasiswas_id', '=', 'mahasiswas.id')
                                        ->join('skripsis', 'pengumpulans.skripsis_id', '=', 'skripsis.id')
                                        ->where('mahasiswas.nama', 'LIKE', '%' . $request->search . '%')
                                        ->paginate(10);
        } else {
            $pengumpulans = Pengumpulan::with('mahasiswas', 'skripsis')->whereHas('skripsis', function ($query) {
                $query->where('status', '!=', 'Dikonfirmasi');
            })->paginate(10);
                    }
        return view('aslab.konfir_pengumpulan.konfir-pengumpulan', [
            'pengumpulans' => $pengumpulans
        ]);
    }

    public function index2(Request $request){
        $pengumpulans = Pengumpulan::all();

        return view('admin.laporan.laporan-konfir-skripsi', compact('pengumpulans'));
    }
           
    public function show($id){
        $pengumpulans = Pengumpulan::with('mahasiswas', 'skripsis')->find($id);
        $mahasiswas = Mahasiswa::all();
        $skripsis = Skripsi::all();
            
        return view('aslab.konfir_pengumpulan.detail-konfir', compact('pengumpulans','mahasiswas', 'skripsis'));
    }

    public function showlaporan($id){
        $pengumpulans = Pengumpulan::with('mahasiswas', 'skripsis')->find($id);
        $mahasiswas = Mahasiswa::all();
        $skripsis = Skripsi::all();
            
        return view('admin.laporan.detail-konfir', compact('pengumpulans','mahasiswas', 'skripsis'));
    }

    public function create(Request $request)
    {
        // Validasi request
        $request->validate([
            'skripsi_id' => 'required|exists:skripsis,id', // Pastikan skripsi_id ada di tabel skripsis
        ]);

        // Dapatkan data dari request
        $skripsiId = $request->input('skripsi_id');
        $mahasiswaId = auth()->user()->id; // Mendapatkan ID mahasiswa yang sedang login

        // Membuat entri baru di tabel pengumpulans
        Pengumpulan::create([
            'mahasiswas_id' => $mahasiswaId,
            'skripsis_id' => $skripsiId,
        ]);

        // Redirect atau respons sesuai kebutuhan
        return redirect()->back()->with('success', 'Skripsi berhasil diajukan.');
    }

    public function destroy($id){
        $pengumpulans = Pengumpulan::find($id);
    
        $pengumpulans->save();
    
        // Hapus entri dari tabel pengumpulan
        $pengumpulans->delete();
    
        return redirect()->route('konfirmasi-pengumpulan')->with('success', 'Data Berhasil Dihapus!');
    }
    
}
