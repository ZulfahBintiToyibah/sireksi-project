@extends('../layouts/app-mhs')

@section('container')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard Asisten Laboratorium</h1>
    <!-- skripsi-status.blade.php -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-home">Pengumpulan Skripsi</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h1 class="display-2 text-home"><i class="fas fa-graduation-cap"></i></h1>
                    <h2 class="display-4 mb-3">200</h2>
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

</div>
@endsection
