@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<h1 class="h4 mb-3 text-gray-800">Data Yudisiawan</h1>

<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-sharp fa-solid fa-clipboard"></i> Daftar Data Yudisiawan</h6>
                <a href="{{ route('export-ToExcel', ['nomor' => 1]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-file-excel"></i>   Unduh Data</a>     
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th class="text-dark" width="5%" style="text-align: center;">No</th>
                                <th class="text-dark" width="13%" style="text-align: center;">NIM</th>
                                <th class="text-dark" width="20%" style="text-align: center;">Nama</th>
                                <th class="text-dark" width="13%" style="text-align: center;">Program Studi</th>
                                <th class="text-dark" width="12%" style="text-align: center;">Jenis Kelamin</th>
                                <th class="text-dark" width="21%" style="text-align: center;">Status Pengumpulan Skripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mahasiswa)
                            <tr>
                                <td class="text-center align-middle text-dark">{{ $loop->iteration }}</td>                                
                                <td class="text-center text-dark">{{ $mahasiswa->nim }}</td>
                                <td class="align-middle text-dark">{{ $mahasiswa->nama }}</td>
                                <td class="align-middle text-dark">{{ $mahasiswa->prodis->nama_prodi }}</td>
                                <td class="align-middle text-dark">{{ $mahasiswa->jenkel }}</td>
                                <td class="align-middle text-dark text-center">
                                    @if ($mahasiswa->status_pengumpulan == 'Belum Mengumpulkan')
                                        <span class="badge rounded-pill text-white bg-danger">
                                            <i class="fas fa-times-circle"></i> <!-- Icon untuk Belum Mengumpulkan -->
                                            Belum Mengumpulkan
                                        </span>
                                    @elseif ($mahasiswa->status_pengumpulan == 'Sudah Mengumpulkan')
                                        <span class="badge rounded-pill text-white bg-success">
                                            <i class="fas fa-check-circle"></i> <!-- Icon untuk Sudah Mengumpulkan -->
                                            Sudah Mengumpulkan
                                        </span>
                                    @endif
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
@endsection
