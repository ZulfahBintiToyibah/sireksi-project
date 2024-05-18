<!DOCTYPE html>
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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../template/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../template/css/style.css" rel="stylesheet">
</head>

<div class="container">
    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Detail Skripsi</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Detail Skripsi</h6>
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
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="prodis_id" class="col-form-label text-dark">Dosen Pembimbing</label>
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
                                    <label for="kodeskripsis_id" class="col-form-label text-dark">Tahun Terbit</label>
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
                                    <th class="text-dark" width="30%" style="text-align: center;">Judul</th>
                                    <th class="text-dark" width="63%" style="text-align: center;">Abstrak (Dalam Bahasa Indonesia)</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-justify text-dark"></td>
                                        <td class="text-justify text-dark"></td>
                                         
                                    </tr>                                   
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-sm float-right">
                                </ul>
                            </nav>
                        </div>
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
 