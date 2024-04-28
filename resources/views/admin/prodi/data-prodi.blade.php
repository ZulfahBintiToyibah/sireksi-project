@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Program Studi</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fa fa-graduation-cap"></i> Daftar Program Studi</h6>
                <div class="card-tools">
                    <a href="{{ route('create-prodi') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-plus"></i> Tambah Program Studi</a>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="row mb-2">
                    <div class="col-md-4">
                        <form class="navbar-search" action="/prodi" method="GET">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-sm bg-light border-1 small" placeholder="Masukkan program studi..." name="search" autocomplete="off">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if ($prodis->isEmpty())
                <div class="alert alert-info" role="alert">
                    Tidak ada data yang cocok dengan kriteria pencarian.
                </div>
                @else
                    <!-- Kode tabel Anda untuk menampilkan data -->
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                        <thead>
                            <th class="text-dark" width="5%" style="text-align: center;">No</th>
                            <th class="text-dark" width="30%">Nama Program Studi</th>
                            <th class="text-dark" width="50%" style="text-align: center;">Keterangan Program Studi</th>
                            <th class="text-dark" width="15%" style="text-align: center;">Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($prodis as $prodi)
                            <tr>
                                <td class="text-center align-middle text-dark">{{ $loop->iteration + ($prodis->currentPage() - 1) * $prodis->perPage() }}</td>
                                <td class="align-middle text-dark">{{ $prodi->nama_prodi }}</td>
                                <td class="align-middle text-dark">{{ $prodi->ket_prodi }}</td>
                                <td class="align-middle text-center">
                                    <a href="/tampil-prodi/{{ $prodi->id }}" class="badge badge-success"><i class="fas fa-fw fa-edit"></i><span> Edit</span></a> | <a href="javascript:if(confirm('Anda yakin ingin menghapus data Program Studi'))window.location.href = '/delete-prodi/{{ $prodi->id }}'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i><span> Hapus</span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination pagination-sm float-right">
                    {{ $prodis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection