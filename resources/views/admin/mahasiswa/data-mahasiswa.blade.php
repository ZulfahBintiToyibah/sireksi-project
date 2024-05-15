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
                    <a href="{{ route('create-mahasiswa') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-fw fa-plus"></i> Tambah Data Pengguna</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-file-excel"></i> Unggah Data
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('importToExcel') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file" id="file" class="form-control-file mr-2">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Unggah Data</button>
                            </div>
                        </div>
                        </div>
                    </div>  
                </div>                
            </div>
            <div class="card-body p-3">
                @if(session('success'))
                <div class="alert alert-success" style="font-size: 14px;">
                    {{ session('success') }}
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th class="text-dark" width="4%" style="text-align: center;">No</th>
                                <th class="text-dark" width="12%" style="text-align: center;">NIM</th>
                                <th class="text-dark" width="18%" style="text-align: center;">Nama</th>
                                <th class="text-dark" width="14%" style="text-align: center;">Program Studi</th>
                                <th class="text-dark" width="13%" style="text-align: center;">Jenis Kelamin</th>
                                <th class="text-dark" width="9%" style="text-align: center;">Alamat</th>
                                <th class="text-dark" width="16%" style="text-align: center;">Role</th>
                                <th class="text-dark" width="12%" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mahasiswa)
                            <tr>
                                <td class="text-center align-middle text-dark">{{ $loop->iteration }}</td>                                
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
                                    <a href="/detail-mahasiswa/{{ $mahasiswa->id }}" class="badge badge-primary"><i class="fas fa-fw fa-regular fa-eye"></i></a> | 
                                    <a href="/tampil-mahasiswa/{{ $mahasiswa->id }}" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a> | 
                                    <a href="javascript:if(confirm('Anda yakin ingin menghapus data Pengguna {{ $mahasiswa->nama }} ?'))window.location.href = '/delete-mahasiswa/{{ $mahasiswa->id }}'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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