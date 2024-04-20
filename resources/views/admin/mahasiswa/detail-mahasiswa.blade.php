@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Detail Mahasiswa</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card shadow border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title">Form Detail Mahasiswa</h6>
                <div class="card-tools">
                    <a href="{{ route('mahasiswa') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered shadow">
                            <tr>
                                <td class="align-middle" width="25%" rowspan="8">
                                    <img src="{{ asset('storage/foto-mahasiswa/' . $mahasiswas->foto) }}" class="img-fluid shadow" alt="" width="100%">
                                </td>
                                <td class="align-middle text-dark judul-buku" colspan="2">
                                    <b>Biodata Mahasiswa</b>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark" width="17%">NIM</td>
                                <td class="align-middle text-dark" width="48%">{{ $mahasiswas->nim }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Nama</td>
                                <td class="align-middle text-dark">{{ $mahasiswas->nama }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Program Studi</td>
                                <td class="align-middle text-dark">{{ $mahasiswas->prodis->nama_prodi }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Jenis Kelamin</td>
                                <td class="align-middle text-dark">{{ $mahasiswas->jenkel }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">No Telepon</td>
                                <td class="align-middle text-dark">{{ $mahasiswas->no_telp }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Alamat</td>
                                <td class="align-middle text-dark">{{ $mahasiswas->alamat }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Role</td>
                                <td class="align-middle text-dark">
                                    @if($mahasiswas->role == 1)
                                        Asisten Laboratorium
                                    @elseif($mahasiswas->role == 2)
                                        Mahasiswa
                                    @else
                                        Role Tidak Diketahui
                                    @endif
                                </td>
                            </tr>
                            <tr>
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