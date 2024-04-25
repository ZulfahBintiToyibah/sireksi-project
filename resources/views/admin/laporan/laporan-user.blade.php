@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Laporan Data Pengguna</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-sharp fa-solid fa-clipboard"></i> Daftar Data Pengguna</h6>
            </div>
            <div class="card-body p-3">
                <div class="row mb-2">
                    <div class="col-md-5">
                        <form class="navbar-search" action="/mahasiswa" method="GET">
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
                                <th class="text-dark" width="13%" style="text-align: center;">NIM</th>
                                <th class="text-dark" width="18%" style="text-align: center;">Nama</th>
                                <th class="text-dark" width="13%" style="text-align: center;">Program Studi</th>
                                <th class="text-dark" width="12%" style="text-align: center;">Jenis Kelamin</th>
                                <th class="text-dark" width="11%" style="text-align: center;">Alamat</th>
                                <th class="text-dark" width="12%" style="text-align: center;">Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mahasiswa)
                            <tr>
                                <td class="text-center align-middle text-dark">{{ $loop->iteration + ($mahasiswas->currentPage() - 1) * $mahasiswas->perPage() }}</td>
                                <td class="text-center text-dark">{{ $mahasiswa->nim }}</td>
                                <td class="align-middle text-dark">{{ $mahasiswa->nama }}</td>
                                <td class="align-middle text-dark">{{ $mahasiswa->prodis->nama_prodi }}</td>
                                <td class="align-middle text-dark">{{ $mahasiswa->jenkel }}</td>
                                <td class="align-middle text-dark">{{ $mahasiswa->alamat }}</td>
                                <td class="text-center align-middle">
                                    @if($mahasiswa->role == 1)
                                        <span class="badge badge-danger">Asisten Laboratorium</span>
                                    @elseif($mahasiswa->role == 2)
                                        <span class="badge badge-primary">Mahasiswa</span>
                                    @else
                                        <span class="badge badge-secondary">Role Tidak Diketahui</span>
                                    @endif
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
@endsection