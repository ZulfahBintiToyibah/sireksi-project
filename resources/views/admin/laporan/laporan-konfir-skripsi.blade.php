@extends('../layouts/app')

@section('container')
<!-- Page Heading -->
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h1 class="h4 mb-3 text-gray-800">Laporan Data Pengumpulan Skripsi</h1>
</div> 
<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card border-primary">
            <div class="card-header py-3 d-flex justify-content-between align-items-center flex-column flex-md-row">
                <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-solid fa-file"></i> Daftar Pengumpulan Skripsi</h6>
                <div class="card-tools mt-2 mt-md-0">
                    <form action="/export-to-excel" method="get">
                        <input type="text" name="tgl1" id="printTgl1" hidden>
                        <input type="text" name="tgl2" id="printTgl2" hidden>
                        <button  class="btn btn-sm btn-primary shadow-sm" onclick="print()">
                            <i class="fas fa-file-excel"></i> Unduh Laporan
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body p-3">
                <form id="laporan" action="/laporan-konfir" method="POST">
                    @csrf
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="datepicker-date2" class="col-form-label form-control-sm text-dark">Dari</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" name="tgl1" id="datepicker-date" autocomplete="off">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="datepicker-date" class="col-form-label form-control-sm text-dark">Sampai</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" name="tgl2" id="datepicker-date2" autocomplete="off">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-search fa-sm"></i> Cari</button>
                        </div>
                    </div>
                    </form>
                    <hr class="border-primary">
                <div class="table-responsive">
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
                            <td class="align-middle text-dark">{{ $pengumpulan->skripsis->mahasiswas->nama}}</td>
                            <td class="align-middle text-dark">{{ $pengumpulan->skripsis->mahasiswas->prodis->nama_prodi }}</td>
                            <td class="align-middle text-dark">{{ $pengumpulan->skripsis->judul }}</td>
                            <td class="align-middle text-dark text-center">{{ \Carbon\Carbon::parse($pengumpulan->skripsis->created_at)->translatedFormat('d F Y') }}</td>
                            <td class="align-middle text-dark text-center">
                                @if($pengumpulan->skripsis->status == 'Diajukan')
                                    <span class="badge rounded-pill text-white bg-warning">{{ $pengumpulan->skripsis->status }}</span>
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
</div>
<script>
    function print(){
        let laporanForm = document.getElementById('laporan')
        let tgl1 = document.getElementById('datepicker-date').value
        let tgl2 = document.getElementById('datepicker-date2').value

        document.getElementById('printTgl1').value = tgl1
        document.getElementById('printTgl2').value = tgl2

        console.log(tgl1)

        laporanForm.submit()
    }
</script>
@endsection
