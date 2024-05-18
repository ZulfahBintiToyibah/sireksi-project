<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Skripsi;
use App\Models\Prodi;
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    public function index3(Request $request)
{
    $mahasiswas = Mahasiswa::where('role', '2')->get();
    $skripsis = Skripsi::all();


    foreach ($mahasiswas as $mahasiswa) {
        // Cek apakah ada skripsi dengan status 'Diajukan' atau 'Dikonfirmasi'
        $mahasiswa->status_pengumpulan = Skripsi::where('mahasiswas_id', $mahasiswa->id)
            ->whereIn('status', ['Diajukan', 'Dikonfirmasi'])
            ->exists() ? 'Sudah Mengumpulkan' : 'Belum Mengumpulkan';
    }

    return view('admin.laporan.laporan-yudisiawan', compact('mahasiswas', 'skripsis'));
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
            'prodis_id' => 'required|exists:prodis,id',
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

public function importToExcel(Request $request)
{
    // Validasi file yang diunggah
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    // Ambil file yang diunggah
    $file = $request->file('file');

    // Load file Excel menggunakan PhpSpreadsheet
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($file);

    // Ambil sheet pertama dari file Excel
    $sheet = $spreadsheet->getActiveSheet();

    // Loop untuk membaca data dari setiap baris pada sheet Excel
    foreach ($sheet->getRowIterator() as $index => $row) {
        // Lewati baris header
        if ($index === 1) {
            continue;
        }

        // Inisialisasi array untuk menyimpan data
        $mahasiswas = [];

        // Mengambil sel di setiap baris
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if they are empty

        // Loop untuk membaca data dari setiap sel pada baris
        foreach ($cellIterator as $cell) {
            // Mengambil nilai dari sel dan menambahkannya ke dalam array data
            $mahasiswas[] = $cell->getValue();
        }

        $username = $mahasiswas[0] ?? null; // Asumsikan NIM ada di kolom pertama
        $password = isset($mahasiswas[0]) ? bcrypt($mahasiswas[0]) : null; // Menggunakan NIM sebagai password dan di-hash dengan bcrypt
        
        // Ambil ID prodi berdasarkan nama prodi
        $prodis = isset($mahasiswas[2]) ? Prodi::where('nama_prodi', $mahasiswas[2])->first() : null;
        // Tentukan nilai untuk 'prodis_id'
        $prodisId = $prodis ? $prodis->id : null;

        // Insert data ke dalam database
        Mahasiswa::create([
            'nim' => $username,
            'nama' => $mahasiswas[1],
            'prodis_id' => $prodisId,
            'role' => $mahasiswas[3],
            'jenkel' => $mahasiswas[4] ?? null,
            'password' => $password,
            'no_telp' => $mahasiswas[5] ?? null,
            'alamat' => $mahasiswas[6] ?? null,
            'foto' => $mahasiswas[7] ?? null,
        ]);
    }

    // Redirect kembali ke halaman data mahasiswa dengan pesan sukses
    return redirect()->route('mahasiswa')->with('success', 'Data berhasil diimpor dari Excel.');
}

public function exportToExcel()
{
    // Query data yang ingin Anda ekspor (hanya mahasiswa yang belum mengumpulkan)
    $mahasiswas = Mahasiswa::where('role', '2')->get();
    
    // Tambahkan status pengumpulan untuk setiap mahasiswa
    foreach ($mahasiswas as $mahasiswa) {
        $mahasiswa->status_pengumpulan = Skripsi::where('mahasiswas_id', $mahasiswa->id)->exists() ? 'Sudah Mengumpulkan' : 'Belum Mengumpulkan';
    }

    // Filter hanya mahasiswa yang belum mengumpulkan
    $mahasiswasBelumMengumpulkan = $mahasiswas->filter(function ($mahasiswa) {
        return $mahasiswa->status_pengumpulan === 'Belum Mengumpulkan';
    });

    // Buat objek Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Header kolom
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'NIM');
    $sheet->setCellValue('C1', 'Nama');
    $sheet->setCellValue('D1', 'Program Studi');
    $sheet->setCellValue('E1', 'Jenis Kelamin');
    $sheet->setCellValue('F1', 'Keterangan');

    // Data
    $row = 2;
    foreach ($mahasiswasBelumMengumpulkan as $mahasiswa) {
        $sheet->setCellValue('A' . $row, $row - 1); // Nomor baris dimulai dari 1        
        $sheet->setCellValue('B' . $row, $mahasiswa->nim);
        $sheet->setCellValue('C' . $row, $mahasiswa->nama);
        $sheet->setCellValue('D' . $row, $mahasiswa->prodis->nama_prodi);
        $sheet->setCellValue('E' . $row, $mahasiswa->jenkel);
        $sheet->setCellValue('F' . $row, $mahasiswa->status_pengumpulan);
        $row++;
    }

    // Simpan file
    $writer = new Xlsx($spreadsheet);
    $fileName = 'data_mahasiswa_belum_mengumpulkan_skripsi.xlsx'; // Nama file yang diinginkan
    $writer->save($fileName);

    // Download file
    return response()->download($fileName)->deleteFileAfterSend(true);
}

}