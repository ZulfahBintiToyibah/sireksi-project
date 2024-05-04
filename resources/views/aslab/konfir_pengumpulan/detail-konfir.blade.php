@extends('../layouts/app-mhs')

@section('container')
    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Detail Konfirmasi Pengumpulan Skripsi</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Detail Konfirmasi Pengumpulan Skripsi</h6>
                    <div class="card-tools">
                        <a href="{{ route('konfirmasi-pengumpulan') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body" style="font-size: 13px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="nim" class="col-form-label text-dark">Nomor Induk Mahasiswa</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="nim" class="form-control form-control-sm text-dark" name="nim" value="{{ $pengumpulans->skripsis->mahasiswas->nim }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="nama" class="col-form-label text-dark">Nama Mahasiswa</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="nama" class="form-control form-control-sm text-dark" name="nama" value="{{ $pengumpulans->skripsis->mahasiswas->nama }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="prodis_id" class="col-form-label text-dark">Program Studi</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="prodis_id" class="form-control form-control-sm text-dark" name="prodis_id" value="{{ $pengumpulans->skripsis->mahasiswas->prodis->nama_prodi }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="tgl_pengumpulan" class="col-form-label text-dark">Tanggal Pengumpulan</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="tgl_pengumpulan" class="form-control form-control-sm text-dark" name="tgl_pengumpulan" value="{{ \Carbon\Carbon::parse($pengumpulans->tgl_pengumpulan)->format('d F Y') }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="kodeskripsis_id" class="col-form-label text-dark">Kode Skripsi</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="kodeskripsis_id" class="form-control form-control-sm text-dark" name="kodeskripsis_id" value="{{ $pengumpulans->skripsis->kodeskripsis->kode_skripsi }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="kode_peminjaman" class="col-form-label text-dark">Nama Petugas</label>
                                </div>
                                <div class="col-md-8">
                                    {{-- <input type="text" id="nama" class="form-control form-control-sm text-dark" name="nama" value="{{ $pengumpulans->mahasiswas->nama }}" readonly> --}}
                                    <input type="text" id="nama" class="form-control form-control-sm text-danger" name="nama" value="Belum di Konfirmasi" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6 class="mt-2 text-dark"><b>Detail Data Skripsi</b></h6>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                                <thead>
                                    <th class="text-dark" width="30%">Judul</th>
                                    <th class="text-dark" width="70%" style="text-align: center;">Abstrak (Dalam Bahasa Indonesia)</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-justify text-dark">{{ $pengumpulans->skripsis->judul}}</td>
                                        <td class="text-justify text-dark">{{ $pengumpulans->skripsis->abstrak}}</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-sm float-right">
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection