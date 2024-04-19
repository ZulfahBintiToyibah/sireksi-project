@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Detail Asisten Laboratorium</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card shadow border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title">Form Detail Asisten Laboratorium</h6>
                <div class="card-tools">
                    <a href="{{ route('aslab') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-11">
                        <table class="table table-bordered shadow">
                            <tr>
                                <td class="align-middle" width="25%" rowspan="7">
                                    <img src="{{ asset('storage/foto-aslab/' . $aslabs->foto) }}" class="img-fluid shadow" alt="" width="100%">
                                </td>
                                
                                <td class="align-middle text-dark judul-buku" colspan="2">
                                    <b>Biodata Asisten Laboratorium</b>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark" width="17%">Nama</td>
                                <td class="align-middle text-dark" width="48%">{{ $aslabs->nama }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Username</td>
                                <td class="align-middle text-dark">{{ $aslabs->username }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Jenis Kelamin</td>
                                <td class="align-middle text-dark">{{ $aslabs->jenkel }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Email</td>
                                <td class="align-middle text-dark">{{ $aslabs->email }}</td>
                            </tr>
                            <tr>
                                <td class="align-middle text-dark">Jabatan</td>
                                <td class="align-middle text-dark">{{ $aslabs->jabatan }}</td>
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