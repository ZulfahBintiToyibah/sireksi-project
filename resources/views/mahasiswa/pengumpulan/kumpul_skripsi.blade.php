@extends('../layouts/app-mhs')

@section('container')
    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Detail Pengumpulan Skripsi</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Detail Pengumpulan Skripsi</h6>
                </div>
                <div class="card-body" style="font-size: 13px;">
                    @if(session('success'))
                    <div class="alert alert-success" style="font-size: 14px;">
                        {{ session('success') }}
                    </div>
                    @endif        
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="nim" class="col-form-label text-dark">Nomor Induk Mahasiswa</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="nim" class="form-control form-control-sm text-dark" name="nim" value="{{ $skripsis->mahasiswas->nim }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="nama" class="col-form-label text-dark">Nama Mahasiswa</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="nama" class="form-control form-control-sm text-dark" name="nama" value="{{ $skripsis->mahasiswas->nama }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="prodis_id" class="col-form-label text-dark">Program Studi</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="prodis_id" class="form-control form-control-sm text-dark" name="prodis_id" value="{{ $skripsis->mahasiswas->prodis->nama_prodi }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="prodis_id" class="col-form-label text-dark">Dosen Pembimbing</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="prodis_id" class="form-control form-control-sm text-dark" name="prodis_id" value="{{ $skripsis->dosens->nama }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="tgl_pengumpulan" class="col-form-label text-dark">Tanggal Pengumpulan</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="created_at" class="form-control form-control-sm text-dark" name="created_at" value="{{ \Carbon\Carbon::parse($skripsis->created_at)->translatedFormat('d F Y') }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="kodeskripsis_id" class="col-form-label text-dark">Tahun Terbit</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="kodeskripsis_id" class="form-control form-control-sm text-dark" name="kodeskripsis_id" value="{{ $skripsis->tahun }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="kodeskripsis_id" class="col-form-label text-dark">Kode Skripsi</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="kodeskripsis_id" class="form-control form-control-sm text-dark" name="kodeskripsis_id" value="{{ $skripsis->kodeskripsis->kode_skripsi }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="mahasiswas_id" class="col-form-label text-dark">Nama Petugas</label>
                                </div>
                                <div class="col-md-8">
                                    @if ($skripsis->status === 'Dikonfirmasi')
                                        <input type="text" id="mahasiswas_id" class="form-control form-control-sm text-dark" name="mahasiswas_id" value="{{ $skripsis->pengumpulan->mahasiswas->nama }}" readonly>
                                    @else
                                        <input type="text" id="mahasiswas_id" class="form-control form-control-sm text-danger" name="mahasiswas_id" value="Belum Dikonfirmasi" readonly>
                                    @endif
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-12">
                            <h6 class="mt-2 text-dark"><b>Detail Data Skripsi</b></h6>
                            <table class="table table-bordered" id="tabel" width="100%" cellspacing="0" style="font-size: 13px;">
                                <thead>
                                    <th class="text-dark" width="30%" style="text-align: center;">Judul</th>
                                    <th class="text-dark" width="63%" style="text-align: center;">Abstrak (Dalam Bahasa Indonesia)</th>
                                    <th class="text-dark" width="7%" style="text-align: center;">Status</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-justify text-dark">{{ $skripsis->judul}}</td>
                                        <td class="text-justify text-dark">{{ $skripsis->abstrak}}</td>
                                        <td class="text-justify text-dark">
                                            @if($skripsis->status == 'Diajukan')
                                                <span class="badge rounded-pill text-white bg-warning">{{ $skripsis->status }}</span>
                                            @elseif($skripsis->status == 'Dikonfirmasi')
                                                <span class="badge rounded-pill text-white bg-success">{{ $skripsis->status }}</span>
                                            @endif
                                        </td> 
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