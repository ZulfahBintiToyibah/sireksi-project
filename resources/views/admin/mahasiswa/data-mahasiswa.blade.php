@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Data Pengguna</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-sharp fa-solid fa-clipboard"></i> Daftar Data Pengguna</h6>
                <div class="card-tools">
                    <a href="{{ route('create-mahasiswa') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-plus"></i> Tambah Data Pengguna</a>
                </div> 
            </div>
            <div class="card-body p-3">
                <div class="row mb-2">
                    <div class="col-md-4">
                        <form class="navbar-search" action="/mahasiswa" method="GET">
                            <div class="input-group">
                                <select class="form-control form-control-sm selectpicker" name="role" id="role" data-live-search="true">
                                    <option value="0">-- Pilih Role Pengguna --</option>
                                    <option value="1">Asisten Laboratorium</option>
                                    <option value="2">Mahasiswa</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <i class="fas fa-search fa-sm"> Cari</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form class="navbar-search" action="/mahasiswa" method="GET">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-sm bg-light border-1 small" placeholder="Masukkan Nama/Nomor Induk Mahasiswa..." name="search" autocomplete="off">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if ($mahasiswas->isEmpty())
                <div class="alert alert-info" role="alert">
                    Tidak ada data yang cocok dengan kriteria pencarian.
                </div>
                @else
                    <!-- Kode tabel Anda untuk menampilkan data -->
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th class="text-dark" width="5%" style="text-align: center;">No</th>
                                <th class="text-dark" width="13%">NIM</th>
                                <th class="text-dark" width="16%">Nama</th>
                                <th class="text-dark" width="12%">Program Studi</th>
                                <th class="text-dark" width="12%">Jenis Kelamin</th>
                                <th class="text-dark" width="10%">Alamat</th>
                                <th class="text-dark" width="16%">Role</th>
                                <th class="text-dark" width="14%" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mahasiswa)
                            <tr>
                                <td class="text-center align-middle text-dark">{{ $loop->iteration + ($mahasiswas->currentPage() - 1) * $mahasiswas->perPage() }}</td>
                                <td class="align-middle text-dark">{{ $mahasiswa->nim }}</td>
                                <td class="align-middle text-dark">{{ $mahasiswa->nama }}</td>
                                <td class="align-middle text-dark">{{ $mahasiswa->prodis->nama_prodi }}</td>
                                <td class="align-middle text-dark">{{ $mahasiswa->jenkel }}</td>
                                <td class="align-middle text-dark">{{ $mahasiswa->alamat }}</td>
                                <td class="align-middle text-dark">
                                    @if($mahasiswa->role == 1)
                                        Asisten Laboratorium
                                    @elseif($mahasiswa->role == 2)
                                        Mahasiswa
                                    @else
                                        Role Tidak Diketahui
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    <a href="/detail-mahasiswa/{{ $mahasiswa->id }}" class="badge badge-primary"><i class="fas fa-fw fa-regular fa-eye"></i></a> | <a href="/tampil-mahasiswa/{{ $mahasiswa->id }}" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a> | 
                                    <a href="javascript:if(confirm('Anda yakin ingin menghapus data Program Studi'))window.location.href = '/delete-mahasiswa/{{ $mahasiswa->id }}'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i></a>
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