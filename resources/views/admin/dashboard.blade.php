@extends('../layouts/app')

@section('container')
<div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>
                    <div class="row">
                    <!-- Card di Dashboard -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card borderLeft shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-home text-uppercase mb-1">
                                                ASISTEN LABORATORIUM</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aslab }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card borderLeft shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-home text-uppercase mb-1">
                                                MAHASISWA</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mahasiswa }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card borderLeft shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-home text-uppercase mb-1">
                                                PROGRAM STUDI</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProdi }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-graduation-cap fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card borderLeft shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-home text-uppercase mb-1">
                                                DOSEN PEMBIMBING</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalDosen }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-home">Pengumpulan Skripsi</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <h1 class="display-4">{{ $totalPengumpulan }}</h1>
                                        <p class="lead">Jumlah Pengumpulan Skripsi</p>
                                    </div>
                                    <div class="mt-4">
                                        <h6 class="text-home">Status Pengumpulan</h6>
                                        <div class="progress mt-2 mb-2">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $totalDiajukan / $totalPengumpulan * 100 }}%" aria-valuenow="{{ $totalDiajukan }}" aria-valuemin="0" aria-valuemax="{{ $totalPengumpulan }}">{{ $totalDiajukan }} Diajukan</div>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $totalDikonfirmasi / $totalPengumpulan * 100 }}%" aria-valuenow="{{ $totalDikonfirmasi }}" aria-valuemin="0" aria-valuemax="{{ $totalPengumpulan }}">{{ $totalDikonfirmasi }} Dikonfirmasi</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-home">Data Skripsi</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <h1 class="display-4">{{ $totalSkripsi }}</h1>
                                        <p class="lead">Jumlah Data Skripsi Keseluruhan</p>
                                    </div>
                                    <div class="mt-4">
                                        <div class="progress mt-2 mb-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $totalSkripsiPGSD  / $totalSkripsi * 100}}%"
                                                aria-valuenow="{{ $totalSkripsiPGSD }}" aria-valuemin="0" aria-valuemax="{{ $totalSkripsi }}">{{ $totalSkripsiPGSD }} - Pendidikan Guru Sekolah Dasar</div>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $totalSkripsiPBSI / $totalSkripsi * 100}}%"
                                                aria-valuenow="{{ $totalSkripsiPBSI }}" aria-valuemin="0" aria-valuemax="{{ $totalSkripsi }}">{{ $totalSkripsiPBSI }} - Pendidikan Bahasa dan Sastra Indonesia</div>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $totalSkripsiPIF / $totalSkripsi * 100}}%"
                                                aria-valuenow="{{ $totalSkripsiPIF }}" aria-valuemin="0" aria-valuemax="{{ $totalSkripsi }}">{{ $totalSkripsiPIF }} - Pendidikan Informatika</div>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $totalSkripsiPIPA / $totalSkripsi * 100}}%"
                                                aria-valuenow="{{ $totalSkripsiPIPA }}" aria-valuemin="0" aria-valuemax="{{ $totalSkripsi }}">{{ $totalSkripsiPIPA }} - Pendidikan IPA</div>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $totalSkripsiPGPAUD }}%"
                                                aria-valuenow="{{ $totalSkripsiPGPAUD }}" aria-valuemin="0" aria-valuemax="{{ $totalSkripsi }}">{{ $totalSkripsiPGPAUD }} - Pendidikan Guru PAUD</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <!-- Script SweetAlert -->
    <script src="{{ asset('template/sw/sweetalert2.min.js') }}"></script>
    @if(session('success'))
        <script>
            Swal.fire({
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            Swal.fire({
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
</div>

@endsection