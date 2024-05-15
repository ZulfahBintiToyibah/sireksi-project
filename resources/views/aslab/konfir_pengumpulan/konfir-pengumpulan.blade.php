@extends('../layouts/app-mhs')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Konfirmasi Pengumpulan Skripsi</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-book"></i> Daftar Pengumpulan Skripsi</h6>
            </div>
            <div class="card-body p-3">
                @if(session('success'))
                <div class="alert alert-success" style="font-size: 14px;">
                    {{ session('success') }}
                </div>
                @endif    
                <form action="/confirm-skripsi" method="POST">
                    @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th class="text-dark" width="5%" style="text-align: center;">No</th>
                                <th class="text-dark" width="12%" style="text-align: center;">NIM</th>
                                <th class="text-dark" width="19%" style="text-align: center;">Nama</th>
                                <th class="text-dark" width="14%" style="text-align: center;">Program Studi</th>
                                <th class="text-dark" width="19%" style="text-align: center;">Tanggal Pengumpulan</th>
                                <th class="text-dark" width="7%" style="text-align: center;">Status</th>
                                <th class="text-dark" width="24%" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengumpulans as $pengumpulan)
                            <tr>
                                <td class="text-center align-middle text-dark">{{ $loop->iteration }}</td>                                
                                <td class="align-middle text-dark">{{ $pengumpulan->skripsis->mahasiswas->nim }}</td>
                                <td class="align-middle text-dark">{{ $pengumpulan->skripsis->mahasiswas->nama }}</td>
                                <td class="align-middle text-dark">{{ $pengumpulan->skripsis->mahasiswas->prodis->nama_prodi }}</td>
                                <td class="align-middle text-dark text-center">{{ \Carbon\Carbon::parse($pengumpulan->skripsis->created_at)->translatedFormat('d F Y') }}</td>
                                <td class="align-middle text-dark text-center"><span class="badge rounded-pill text-white bg-warning">{{ $pengumpulan->skripsis->status }}</span></td>
                                <td class="align-middle text-center">
                                    <button type="submit" name="skripsi_id" value="{{ $pengumpulan->skripsis->id }}" class="badge badge-success konfirmasi-btn" style="border: none;" onclick="return confirm('Apakah Anda yakin mengkonfirmasi pengumpulan skripsi dengan NIM {{ $pengumpulan->skripsis->mahasiswas->nim }}?')">
                                        <i class="fas fa-check-circle"></i> Konfirmasi
                                    </button>
                                    <a href="/tampil-konfirmasi/{{ $pengumpulan->id }}" class="badge badge-primary"><i class="fas fa-fw fa-regular fa-eye"></i> Detail</a>
                                    <a href="javascript:if(confirm('Anda yakin ingin menghapus data pengumpulan skripsi dengan NIM {{ $pengumpulan->skripsis->mahasiswas->nim }}?'))window.location.href = '/delete-konfirmasi/{{ $pengumpulan->id }}'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
        </div>
    </div>
</div>
</div>
<!-- Script SweetAlert -->
<script src="../template/sw/sweetalert2.min.js"></script>
@if(session('success'))
    <script>
        Swal.fire({
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif
@endsection

<script>
$(document).ready(function() {
    // Event handler untuk tombol konfirmasi
    $('.badge.badge-success.konfirmasi-btn').click(function(e) {
        e.preventDefault(); // Mencegah perilaku default tombol
        var skripsiId = $(this).closest('tr').find('input[name="skripsi_id"]').val(); // Ambil ID skripsi dari input terdekat
        $.ajax({
            url: '{{ route("confirm-skripsi") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                skripsi_id: skripsiId // Kirim ID skripsi ke metode confirmSkripsi
            },
            success: function(response) {
                // Tambahkan logika sukses di sini, jika diperlukan
                console.log('Skripsi berhasil dikonfirmasi.');
                // Kemudian, lakukan pengalihan atau pembaruan halaman jika diperlukan
                window.location.reload(); // Contoh: Reload halaman
            },
            error: function(xhr) {
                // Tambahkan logika penanganan kesalahan di sini, jika diperlukan
                console.error('Terjadi kesalahan saat mengkonfirmasi skripsi.');
            }
        });
    });
});
</script>
