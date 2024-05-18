<?php

namespace App\Http\Controllers;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use App\Models\Pengumpulan;
use App\Models\Mahasiswa;
use App\Models\Skripsi;
use PhpOffice\PhpSpreadsheet\Spreadsheet; // Import kelas Spreadsheet dari PhpSpreadsheet

class PengumpulanController extends Controller
{
    protected $table = 'pengumpulans';
    protected $fillable = ['mahasiswas_id', 'skripsis_id'];
    public function index(Request $request){
        if($request->has('search')){
            $pengumpulans = Pengumpulan::with(['skripsis', 'skripsis.mahasiswas'])->where('mahasiswas.nama', 'LIKE', '%' . $request->search . '%')->paginate(10);
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

    public function destroy($id)
    {
        $pengumpulans = Pengumpulan::find($id);    
        if (!$pengumpulans) {
            return redirect()->route('konfir-pengumpulan')->with('error', 'Data tidak ditemukan!');
        }
        $pengumpulans->delete();
    
        return redirect()->route('konfir-pengumpulan')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportToExcel(Request $request)
{
    // Ambil tanggal dari input form
    $tgl1 = $request->input('tgl1');
    $tgl2 = $request->input('tgl2');

    // Tambahkan 1 hari ke tanggal akhir
    $tgl2PlusOneDay = date('Y-m-d', strtotime($tgl2 . ' +1 day'));

    // Query data berdasarkan rentang tanggal yang dipilih
    $pengumpulans = Pengumpulan::whereHas('skripsis', function ($query) use ($tgl1, $tgl2PlusOneDay) {
        $query->whereBetween('created_at', [$tgl1, $tgl2PlusOneDay]);
    })->get();

    // $pengumpulans = Pengumpulan::all();

    // Buat objek Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Header kolom
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'NIM');
    $sheet->setCellValue('C1', 'Nama');
    $sheet->setCellValue('D1', 'Program Studi');
    $sheet->setCellValue('E1', 'Judul Skripsi');
    $sheet->setCellValue('F1', 'Tanggal Pengumpulan');
    $sheet->setCellValue('G1', 'Status');

    // Data
    $row = 2;
    foreach ($pengumpulans as $pengumpulan) {
        $sheet->setCellValue('A' . $row, $row - 1); // Nomor baris dimulai dari 1        
        $sheet->setCellValue('B' . $row, $pengumpulan->skripsis->mahasiswas->nim);
        $sheet->setCellValue('C' . $row, $pengumpulan->mahasiswas->nama);
        $sheet->setCellValue('D' . $row, $pengumpulan->skripsis->mahasiswas->prodis->nama_prodi);
        $sheet->setCellValue('E' . $row, $pengumpulan->skripsis->judul);
        $sheet->setCellValue('F' . $row, \Carbon\Carbon::parse($pengumpulan->skripsis->created_at)->translatedFormat('d F Y'));
        $sheet->setCellValue('G' . $row, $pengumpulan->skripsis->status);
        $row++;
    }

    // Simpan file
    $writer = new Xlsx($spreadsheet);
    $fileName = 'data_mahasiswa_sudah_mengumpulkan_skripsi.xlsx'; // Nama file yang diinginkan
    $writer->save($fileName);

    // Download file
    return response()->download($fileName)->deleteFileAfterSend(true);
}


    public function filterByDate(Request $request)
    {
        // Validasi input formulir
        $request->validate([
            'tgl1' => 'required|date',
            'tgl2' => 'required|date|after_or_equal:tgl1',
        ]);
    
        // Ambil tanggal awal dan akhir dari input formulir
        $tgl1 = $request->input('tgl1');
        $tgl2 = $request->input('tgl2');
    
        // Tambahkan 1 hari ke tanggal akhir
        $tgl2PlusOneDay = date('Y-m-d', strtotime($tgl2 . ' +1 day'));
    
        // Query data berdasarkan rentang tanggal
        $pengumpulans = Pengumpulan::whereHas('skripsis', function ($query) use ($tgl1, $tgl2PlusOneDay) {
            $query->whereBetween('created_at', [$tgl1, $tgl2PlusOneDay]);
        })->get();
    
        // Kembalikan tampilan dengan data yang sudah difilter
        // Anda bisa menambahkan tombol atau link di sini untuk memicu unduhan
        return view('admin.laporan.laporan-konfir-skripsi', compact('pengumpulans', 'tgl1', 'tgl2'));
    }
    
}
