@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Data Skripsi</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-sharp fas fa-fw fa-book"></i> Daftar Data Skripsi</h6>
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
                                <th class="text-dark" width="1%" style="text-align: center;">No</th>
                                <th class="text-dark" width="13%" style="text-align: center;">Nama</th>
                                <th class="text-dark" width="19%" style="text-align: center;">Judul</th>
                                <th class="text-dark" width="15%" style="text-align: center;">Dosen Pembimbing</th>
                                <th class="text-dark" width="26%" style="text-align: center;">Abstrak</th>
                                <th class="text-dark" width="13%" style="text-align: center;">Kode Skripsi</th>
                                <th class="text-dark" width="11%" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skripsis as $skripsi)
                            <tr>
                                <td class="text-center align-middle text-dark">{{ $loop->iteration }}</td>                                
                                <td class="align-middle text-dark">{{ $skripsi->mahasiswas->nama }}</td>
                                <td class="align-middle text-dark">{{ $skripsi->judul }}</td>
                                <td class="align-middle text-dark">{{ $skripsi->dosens->nama }}</td>
                                <td class="align-middle text-dark">{{ substr($skripsi->abstrak, 0, 100) }}{{ strlen($skripsi->abstrak) > 100 ? "..." : "" }}</td>
                                <td class="align-middle text-dark">{{ $skripsi->kodeskripsis->kode_skripsi }}</td>                                
                                <td class="align-middle text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="/detail-skripsi/{{ $skripsi->id }}" class="badge badge-primary mr-1"><i class="fas fa-fw fa-regular fa-eye"></i></a>
                                        <a href="/tampil-skripsi/{{ $skripsi->id }}" class="badge badge-success mr-1"><i class="fas fa-fw fa-edit"></i></a>
                                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data skripsi {{ $skripsi->mahasiswas->nama }} ?'))window.location.href = '/delete-skripsi/{{ $skripsi->id }}'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i></a>
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