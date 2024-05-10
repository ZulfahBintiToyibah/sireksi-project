{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sireksi</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../template/img/favicon.ico">
    <!-- Custom fonts for this template-->
    <link href="../template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../template/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../template/css/style.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap -->
<link href="../dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@700&display=swap" rel="stylesheet">

<link href="../template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<!-- Style Beranda -->
<link href="../dist/css/style.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@700&family=Poetsen+One&family=Poppins:wght@600&display=swap" rel="stylesheet">

<!-- navbar -->
<nav class="navbar sticky-top fixed-top navbar-expand-lg nav-bg" style="z-index: 1000;">    
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img src="../template/img/login/lOGO SIREKSI.png" alt="uLibrary" class="logo-ulibrary">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-list" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('homepage') }}" style="color: white;">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#tentangsatu" style="color: white;">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tentangsatu-new" style="color: white;">Panduan</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-secondary btn-sign-in" type="button">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body id="page-top" style="background-color: #fff;">
    <div class="container">
    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-white-800" style="color: white; font-weight: bold;">Detail Data Skripsi</h1>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Detail Data Skripsi</h6>
                    <div class="card-tools">
                        <a href="{{ route('hasil-rekom') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body" style="font-size: 13px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="nim" class="col-form-label text-dark">Nomor Induk Mahasiswa</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="nim" class="form-control form-control-sm text-dark" name="nim" value="" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="nama" class="col-form-label text-dark">Nama Mahasiswa</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="nama" class="form-control form-control-sm text-dark" name="nama" value="" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="prodis_id" class="col-form-label text-dark">Program Studi</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="prodis_id" class="form-control form-control-sm text-dark" name="prodis_id" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="tgl_pengumpulan" class="col-form-label text-dark">Tanggal Pengumpulan</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="created_at" class="form-control form-control-sm text-dark" name="created_at" value="" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="kodeskripsis_id" class="col-form-label text-dark">Dosen Pembimbing</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="kodeskripsis_id" class="form-control form-control-sm text-dark" name="kodeskripsis_id" value="" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="kodeskripsis_id" class="col-form-label text-dark">Kode Skripsi</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="kodeskripsis_id" class="form-control form-control-sm text-dark" name="kodeskripsis_id" value="" readonly>
                                </div>
                            </div>                    
                        </div>
                        <div class="col-md-12">
                            <h6 class="mt-2 text-dark"><b>Detail Data Skripsi</b></h6>
                            <table class="table table-bordered" id="tabel" width="100%" cellspacing="0" style="font-size: 13px;">
                                <thead>
                                    <th class="text-dark" width="30%">Judul</th>
                                    <th class="text-dark" width="70%" style="text-align: center;">Abstrak (Dalam Bahasa Indonesia)</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-justify text-dark"></td>
                                        <td class="text-justify text-dark"></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap core JavaScript-->
<script src="../template/vendor/jquery/jquery.min.js"></script>
<script src="../template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../template/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../template/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../template/js/demo/datatables-demo.js"></script>

<!-- Page level plugins -->
<script src="../template/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../template/js/demo/chart-area-demo.js"></script>
<script src="../template/js/demo/chart-pie-demo.js"></script>
 --}}
