@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Data Asisten Laboratorium</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-sharp fa-solid fa-clipboard"></i> Daftar Data Asisten Laboratorium</h6>
                <div class="card-tools">
                    <a href="{{ route('aslab') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-plus"></i> Tambah Data Asisten Laboratorium</a>
                </div> 
            </div>
            <div class="card-body p-3">
                <div class="row mb-2">
                    <div class="col-md-5">
                        <form class="navbar-search" action="/aslab" method="GET">
                            <div class="input-group">
                                <input type="search" class="form-control bg-light border-1 small" placeholder="Search for..." name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th class="text-dark" width="5%" style="text-align: center;">No</th>
                                <th class="text-dark" width="15%">NIM</th>
                                <th class="text-dark" width="25%">Nama</th>
                                <th class="text-dark" width="13%">Program Studi</th>
                                <th class="text-dark" width="13%">Jenis Kelamin</th>
                                <th class="text-dark" width="15%">Alamat</th>
                                <th class="text-dark" width="14%" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $aslab)
                            <tr>
                                <td class="text-center align-middle text-dark">{{ $loop->iteration + ($mahasiswas->currentPage() - 1) * $mahasiswas->perPage() }}</td>
                                <td class="align-middle text-dark">{{ $aslab->nim }}</td>
                                <td class="align-middle text-dark">{{ $aslab->nama }}</td>
                                <td class="align-middle text-dark">{{ $aslab->prodis->nama_prodi }}</td>
                                <td class="align-middle text-dark">{{ $aslab->jenkel }}</td>
                                <td class="align-middle text-dark">{{ $aslab->alamat }}</td>
                                <td class="align-middle text-center">
                                    <a href="/detail-aslab/{{ $aslab->id }}" class="badge badge-primary"><i class="fas fa-fw fa-regular fa-eye"></i></a> | <a href="/tampil-aslab/{{ $aslab->id }}" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a> | 
                                    <a href="javascript:if(confirm('Anda yakin ingin menghapus data Program Studi'))window.location.href = '/delete-aslab/{{ $aslab->id }}'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination pagination-sm float-right">
                    {{ $mahasiswas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection