@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h4 mb-3 text-gray-800">Laporan Data Pengumpulan Skripsi</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-file-excel"></i>   Unduh Laporan</a>
</div> 
<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-book"></i> Daftar Pengumpulan Skripsi</h6>
            </div>
            <div class="card-body p-3">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                    <thead>
                        <th class="text-dark" width="2%" style="text-align: center;">No</th>
                        <th class="text-dark" width="3%" style="text-align: center;">NIM</th>
                        <th class="text-dark" width="13%" style="text-align: center;">Nama</th>
                        <th class="text-dark" width="12%" style="text-align: center;">Program Studi</th>
                        <th class="text-dark" width="25%" style="text-align: center;">Judul Skripsi</th>
                        <th class="text-dark" width="14%" style="text-align: center;">Tgl Pengumpulan</th>
                        <th class="text-dark" width="3%" style="text-align: center;">Status</th>
                        <th class="text-dark" width="2%" style="text-align: center;">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($pengumpulans as $pengumpulan)
                        <tr>
                            <td class="text-center align-middle text-dark">{{ $loop->iteration }}</td>                                
                            <td class="align-middle text-dark">{{ $pengumpulan->skripsis->mahasiswas->nim }}</td>
                            <td class="align-middle text-dark">{{ $pengumpulan->mahasiswas->nama }}</td>
                            <td class="align-middle text-dark">{{ $pengumpulan->skripsis->mahasiswas->prodis->nama_prodi }}</td>
                            <td class="align-middle text-dark">{{ $pengumpulan->skripsis->judul }}</td>
                            <td class="align-middle text-dark text-center">{{ \Carbon\Carbon::parse($pengumpulan->skripsis->created_at)->translatedFormat('d F Y') }}</td>
                            <td class="align-middle text-dark text-center">
                                @if($pengumpulan->skripsis->status == 'Diajukan')
                                    <span class="badge rounded-pill text-white bg-danger">{{ $pengumpulan->skripsis->status }}</span>
                                @elseif($pengumpulan->skripsis->status == 'Dikonfirmasi')
                                    <span class="badge rounded-pill text-white bg-success">{{ $pengumpulan->skripsis->status }}</span>
                                @endif
                            </td>        
                            <td class="align-middle text-center">
                                <a href="/tampil-laporan/{{ $pengumpulan->id }}" class="badge badge-primary"><i class="fas fa-fw fa-regular fa-eye"></i></a>            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
</div>
@endsection
