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
                <div class="row mb-2">
                    <div class="col-md-4">
                        <form class="navbar-search" action="/dospem" method="GET">
                            <div class="input-group">
                                <select class="form-control form-control-sm selectpicker" name="prodis_id" id="prodis_id" data-live-search="true">
                                    <option value="">-- Pilih Program Studi --</option>
                                    @foreach($prodis as $prodi)
                                        <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                                    @endforeach                                
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
                        <form class="navbar-search" action="/dospem" method="GET">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-sm bg-light border-1 small" placeholder="Masukkan Nama atau NIP..." name="search" autocomplete="off">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if ($dospems->isEmpty())
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
                                <th class="text-dark" width="5%"  style="text-align: center;">No</th>
                                <th class="text-dark" width="20%" style="text-align: center;">NIP</th>
                                <th class="text-dark" width="45%" style="text-align: center;">Nama</th>
                                <th class="text-dark" width="15%">Program Studi</th>
                                <th class="text-dark" width="15%" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dospems as $dospem)
                            <tr>
                                <td class="text-center align-middle text-dark">{{ $loop->iteration + ($dospems->currentPage() - 1) * $dospems->perPage() }}</td>
                                <td class="align-middle text-center">{{ $dospem->nip }}</td>
                                <td class="align-middle text-dark">{{ $dospem->nama }}</td>
                                <td class="align-middle text-dark">{{ $dospem->prodis->nama_prodi }}</td>
                                <td class="align-middle text-center">
                                    <a href="/tampil-dospem/{{ $dospem->id }}" class="badge badge-success"><i class="fas fa-fw fa-edit"></i><span> Edit</span></a> | <a href="javascript:if(confirm('Anda yakin ingin menghapus data Program Studi'))window.location.href = '/delete-dospem/{{ $dospem->id }}'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i><span> Hapus</span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination pagination-sm float-right">
                    {{ $dospems->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection