@extends('../layouts/app-mhs')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" style="background-color: #3C096C; color: white;">Instruksi Pengumpulan Skripsi</div>
            <div class="card-body">
                <p style="font-weight: bold; font-size: 20px;">Selamat datang di Pengumpulan Skripsi Ruang Baca!</p>
                <p>Untuk mengumpulkan skripsi Anda, silakan ikuti langkah-langkah berikut:</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#instructionsModal">
                    <i class="fas fa-info-circle mr-2"></i> Lihat Instruksi
                </button>
                <p class="mt-3">Jika Anda mengalami kesulitan atau memiliki pertanyaan, jangan ragu untuk menghubungi Asisten Laboratorium yang bertugas.</p>
                <p>Terima kasih atas partisipasi Anda!</p>
            </div>
        </div>
    </div>
</div>


<!-- Modal untuk semua langkah instruksi -->
<div class="modal fade" id="instructionsModal" tabindex="-1" role="dialog" aria-labelledby="instructionsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="instructionsModalLabel">Instruksi Pengumpulan Skripsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: justify;">
                <ol class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Pastikan Anda sudah memiliki dokumen cetak skripsi dalam format yang diterima. Kami menerima Dokumen Fisik Skripsi Hardcover sesuai dengan ketentuan skripsi Fakultas Ilmu Pendidikan.</li>
                    <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Setelah menyerahkan dokumen skripsi ke Asisten Laboratorium, Kunjungi halaman "Pengumpulan Skripsi" di website Sireksi by Ruang Baca.</li>
                    <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Isi formulir pengumpulan dengan lengkap. Pastikan untuk memasukkan judul skripsi, abstrak, dosen pembimbing, tahun terbit, dan kode skripsi dengan benar.</li>
                    <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Unggah file skripsi Anda menggunakan tombol "Simpan" untuk menyelesaikan proses pengumpulan.</li>
                    <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Setelah mengunggah, akan muncul detail data skripsi lengkap yang telah diunggah tadi.</li>
                    <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Selesai, selanjutnya data skripsi akan dikonfirmasi oleh Asisten Laboratorium.</li>
                </ol>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
 <!-- Script SweetAlert -->
 <script src="{{ asset('template/sw/sweetalert2.min.js') }}"></script>
 @if(session('success'))
     <script>
         Swal.fire({
             text: '{{ session('success') }}',
             icon: 'success',
             confirmButtonText: 'OK'
         });
     </script>
 @endif
 @if(session('error'))
     <script>
         Swal.fire({
             text: '{{ session('error') }}',
             icon: 'error',
             confirmButtonText: 'OK'
         });
     </script>
 @endif
@endsection