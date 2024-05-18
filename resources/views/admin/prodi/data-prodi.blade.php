@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Program Studi</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center flex-column flex-md-row">
                <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fa fa-graduation-cap"></i> Daftar Program Studi</h6>
                <div class="card-tools mt-2 mt-md-0">
                    <a href="{{ route('create-prodi') }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i> Tambah Program Studi</a>
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
                                <th class="text-dark" width="5%" style="text-align: center;">No</th>
                                <th class="text-dark" width="30%" style="text-align: center;">Nama Program Studi</th>
                                <th class="text-dark" width="50%" style="text-align: center;">Keterangan Program Studi</th>
                                <th class="text-dark" width="15%" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prodis as $prodi)
                            <tr>
                                <td class="text-center align-middle text-dark">{{ $loop->iteration }}</td>                                
                                <td class="align-middle text-dark">{{ $prodi->nama_prodi }}</td>
                                <td class="align-middle text-dark">{{ $prodi->ket_prodi }}</td>
                                <td class="align-middle text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="/tampil-prodi/{{ $prodi->id }}" class="badge badge-success mr-1"><i class="fas fa-fw fa-edit"></i><span> Edit</span></a>
                                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data Program Studi {{ $prodi->nama_prodi }} ?'))window.location.href = '/delete-prodi/{{ $prodi->id }}'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i><span> Edit</span></a>
                                    </div>
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
