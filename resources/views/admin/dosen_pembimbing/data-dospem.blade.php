@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Dosen Pembimbing</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-sharp fa-solid fa-clipboard"></i> Daftar Dosen Pembimbing</h6>
                <div class="card-tools">
                    <a href="{{ route('create-dospem') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-plus"></i> Tambah Dosen Pembimbing</a>
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
                                <th class="text-dark" width="5%"  style="text-align: center;">No</th>
                                <th class="text-dark" width="20%" style="text-align: center;">NIP</th>
                                <th class="text-dark" width="45%" style="text-align: center;">Nama</th>
                                <th class="text-dark" width="15%" style="text-align: center;">Program Studi</th>
                                <th class="text-dark" width="15%" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dospems as $dospem)
                            <tr>
                                <td class="text-center align-middle text-dark">{{ $loop->iteration }}</td>                                
                                <td class="align-middle text-center">{{ $dospem->nip }}</td>
                                <td class="align-middle text-dark">{{ $dospem->nama }}</td>
                                <td class="align-middle text-dark">{{ $dospem->prodis->nama_prodi }}</td>
                                <td class="align-middle text-center">
                                    <a href="/tampil-dospem/{{ $dospem->id }}" class="badge badge-success"><i class="fas fa-fw fa-edit"></i><span> Edit</span></a> | <a href="javascript:if(confirm('Anda yakin ingin menghapus data Dosen Pembimbing {{ $dospem->nama }} ?'))window.location.href = '/delete-dospem/{{ $dospem->id }}'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i><span> Hapus</span></a>
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