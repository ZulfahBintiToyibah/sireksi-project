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
                                                DATA ASISTEN LAB</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aslab }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
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
                                                DATA MAHASISWA</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mahasiswa }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-solid fa-book fa-2x text-gray-300"></i>
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
                                            <i class="fas fa-fw fa-sharp fa-solid fa-clipboard fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->

                    <div class="row">

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-home">Total Pengunjung</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <h1 class="display-4">536</h1>
                                        <p class="lead">Total Pengunjung</p>
                                    </div>
                                    <div class="mt-4">
                                        <h6 class="text-home">Pengunjung Mingguan</h6>
                                        <div class="progress mt-2 mb-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">Minggu ini</div>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Minggu Lalu</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- skripsi-status.blade.php -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-home">Pengumpulan Skripsi</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <h1 class="display-4">{{ $totalSkripsi }}</h1>
                                        <p class="lead">Jumlah Pengumpulan Skripsi</p>
                                    </div>
                                    <div class="mt-4">
                                        <h6 class="text-home">Status Pengumpulan</h6>
                                        <div class="progress mt-2 mb-2">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50% Diajukan</div>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75% Dikonfirmasi</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-home">Total Data Skripsi</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <h1 class="display-4">{{ $totalSkripsi }}</h1>
                                        <p class="lead">Total Data Skripsi</p>
                                    </div>
                                    <div class="mt-4">
                                        <div class="progress mt-2 mb-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 20%"
                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">PGSD</div>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 30%"
                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">PBSI</div>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-dark" role="progressbar" style="width: 25%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">PIF</div>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 15%"
                                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">PIPA</div>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 45%"
                                                aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">PGPAUD</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>

@include('sweetalert::alert')
@endsection