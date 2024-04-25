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
                <div class="row mb-2">
                    <div class="col-md-4">
                        <form class="navbar-search" action="" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm  bg-light border-1 small" placeholder="Masukkan nama mahasiswa ..." name="katakunci_kode" autocomplete="off">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form class="navbar-search" action="" method="GET">
                            <div class="input-group">
                                <select class="form-control form-control-sm selectpicker" name="" id="" data-live-search="true">
                                    <option value="0">-- Pilih Program Studi --</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <i class="fas fa-search fa-sm"> Cari</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <form action="/confirm-skripsi" method="POST">
                    @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th class="text-dark" width="5%" style="text-align: center;">No</th>
                                <th class="text-dark" width="14%" style="text-align: center;">NIM</th>
                                <th class="text-dark" width="21%" style="text-align: center;">Nama</th>
                                <th class="text-dark" width="12%" style="text-align: center;">Program Studi</th>
                                <th class="text-dark" width="17%" style="text-align: center;">Tanggal Pengumpulan</th>
                                <th class="text-dark" width="7%" style="text-align: center;">Status</th>
                                <th class="text-dark" width="24%" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengumpulans as $pengumpulan)
                            <tr>
                                <td class="text-center align-middle text-dark">{{ $loop->iteration + ($pengumpulans->currentPage() - 1) * $pengumpulans->perPage() }}</td>
                                <td class="align-middle text-dark">{{ $pengumpulan->skripsis->mahasiswas->nim }}</td>
                                <td class="align-middle text-dark">{{ $pengumpulan->skripsis->mahasiswas->nama }}</td>
                                <td class="align-middle text-dark">{{ $pengumpulan->skripsis->mahasiswas->prodis->nama_prodi }}</td>
                                <td class="align-middle text-dark text-center">{{ \Carbon\Carbon::parse($pengumpulan->skripsis->created_at)->format('d F Y') }}</td>
                                <td class="align-middle text-dark text-center"><span class="badge rounded-pill text-white bg-danger">{{ $pengumpulan->skripsis->status }}</span></td>
                                <td class="align-middle text-center">
                                    <button type="submit" name="skripsi_id" value="{{ $pengumpulan->skripsis->id }}" class="badge badge-success konfirmasi-btn"><i class="fas fa-fw fa-regular fa-eye"></i> Konfirmasi</button>
                                    <a href="/tampil-konfirmasi/{{ $pengumpulan->id }}" class="badge badge-primary"><i class="fas fa-fw fa-regular fa-eye"></i> Detail</a>
                                    <a href="javascript:if(confirm('Anda yakin ingin menghapus data Konfirmasi Skripsi ?'))window.location.href = '/delete-konfirmasi/{{ $pengumpulan->id }}'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                
                <div class="pagination pagination-sm float-right">
                    {{ $pengumpulans->links() }}
            </div>
        </div>
    </div>
</div>
</div>
@include('sweetalert::alert')
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
