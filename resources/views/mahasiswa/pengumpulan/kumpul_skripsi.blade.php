@extends('../layouts/app-mhs')

@section('container')
    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Pengumpulan Skripsi</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Detail Pengumpulan Skripsi</h6>
                    <div class="card-tools">
                        <a href="{{ route('create-skripsi') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-plus"></i> Kumpulkan Skripsi</a>
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
                                    <input type="text" id="nim" class="form-control form-control-sm text-dark" name="nim" value="" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="nama" class="col-form-label text-dark">Nama Mahasiswa</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="nama" class="form-control form-control-sm text-dark" name="nama" value="" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="prodis_id" class="col-form-label text-dark">Program Studi</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="prodis_id" class="form-control form-control-sm text-dark" name="prodis_id" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="tgl_pengumpulan" class="col-form-label text-dark">Tanggal Pengumpulan</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="created_at" class="form-control form-control-sm text-dark" name="created_at" value="" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="kodeskripsis_id" class="col-form-label text-dark">Kode Skripsi</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="kodeskripsis_id" class="form-control form-control-sm text-dark" name="kodeskripsis_id" value="" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="mahasiswas_id" class="col-form-label text-dark">Nama Petugas</label>
                                </div>
                                <div class="col-md-8">
                                    {{-- @if ($pengumpulans->skripsis->status === 'Dikonfirmasi')
                                        <input type="text" id="mahasiswas_id" class="form-control form-control-sm text-dark" name="mahasiswas_id" value="" readonly>
                                    @else --}}
                                        <input type="text" id="mahasiswas_id" class="form-control form-control-sm text-danger" name="mahasiswas_id" value="Belum Dikonfirmasi" readonly>
                                    {{-- @endif --}}
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-12">
                            <h6 class="mt-2 text-dark"><b>Detail Data Skripsi</b></h6>
                            <table class="table table-bordered" id="tabel" width="100%" cellspacing="0" style="font-size: 13px;">
                                <thead>
                                    <th class="text-dark" width="30%">Judul</th>
                                    <th class="text-dark" width="70%" style="text-align: center;">Abstrak (Dalam Bahasa Indonesia)</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-justify text-dark"></td>
                                        <td class="text-justify text-dark"></td>
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