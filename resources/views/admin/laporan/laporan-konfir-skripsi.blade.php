@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Laporan Data Pengumpulan</h1>

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
                        <form class="navbar-search" action="/konfirmasi-pengumpulan" method="GET">
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
                        <form class="navbar-search" action="/konfirmasi-pengumpulan" method="GET">
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                    <thead>
                        <th class="text-dark" width="4%" style="text-align: center;">No</th>
                        <th class="text-dark" width="7%" style="text-align: center;">NIM</th>
                        <th class="text-dark" width="11%" style="text-align: center;">Nama</th>
                        <th class="text-dark" width="9%" style="text-align: center;">Program Studi</th>
                        <th class="text-dark" width="25%" style="text-align: center;">Judul SKripsi</th>
                        <th class="text-dark" width="13%" style="text-align: center;">Tanggal Pengumpulan</th>
                        <th class="text-dark" width="7%" style="text-align: center;">Status</th>
                    </thead>
                    <tbody>
                        @foreach ($pengumpulans as $pengumpulan)
                        <tr>
                            <td class="text-center align-middle text-dark">{{ $loop->iteration + ($pengumpulans->currentPage() - 1) * $pengumpulans->perPage() }}</td>
                            <td class="align-middle text-dark">{{ $pengumpulan->skripsis->mahasiswas->nim }}</td>
                            <td class="align-middle text-dark">{{ $pengumpulan->skripsis->mahasiswas->nama }}</td>
                            <td class="align-middle text-dark">{{ $pengumpulan->skripsis->mahasiswas->prodis->nama_prodi }}</td>
                            <td class="align-middle text-dark">{{ $pengumpulan->skripsis->judul }}</td>
                            <td class="align-middle text-dark text-center">{{ \Carbon\Carbon::parse($pengumpulan->skripsis->created_at)->format('d F Y') }}</td>
                            <td class="align-middle text-dark text-center"><span class="badge rounded-pill text-white bg-danger">{{ $pengumpulan->skripsis->status }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination pagination-sm float-right">
                    {{ $pengumpulans->links() }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
