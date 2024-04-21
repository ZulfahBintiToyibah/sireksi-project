@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Detail Skripsi Mahasiswa</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card shadow border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title">Form Detail Skripsi</h6>
                <div class="card-tools">
                    <a href="{{ route('skripsi') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered shadow">
                            <tr>
                                <td class="align-middle text-dark judul-buku" colspan="2">
                                    <b>Detail Skripsi Mahasiswa</b>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark" width="15%">Nomor Induk Mahasiswa (NIM)</td>
                                <td class="align-middle text-dark" width="48%">{{ $skripsis->mahasiswas->nim }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Nama</td>
                                <td class="align-middle text-dark">{{ $skripsis->mahasiswas->nama }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Program Studi</td>
                                <td class="align-middle text-dark">{{ $skripsis->mahasiswas->prodis->nama_prodi }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Tahun Terbit</td>
                                <td class="align-middle text-dark">{{ $skripsis->tahun }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Dosen Pembimbing</td>
                                <td class="align-middle text-dark">{{ $skripsis->dosens->nama }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Kode Skripsi</td>
                                <td class="align-middle text-dark">{{ $skripsis->kodeskripsis->kode_skripsi }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Judul</td>
                                <td class="align-middle text-dark">{{ $skripsis->judul }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <h5 class="mt-2 text-abstrak text-dark">Abstrak</h5>
                                    <p class="text-justify text-dark">{{ $skripsis->abstrak }}</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div> -->
        </div>
    </div>
</div>

@endsection