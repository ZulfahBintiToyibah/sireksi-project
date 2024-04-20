<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sireksi</title>

    <!-- Custom fonts for this template-->
    <link href="../template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../template/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-secondary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg" style="margin: 48px auto;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background-image: url('template/img/login/login_bg.png'); background-size: cover; padding: 244px 0;">
                                <div class="logo text-center">
                                    <img src="template/img/login/lOGO SIREKSI.png" alt="uLibrary Logo" style="width: 300px;">
                                </div>
                            </div>
                            <div class="col-lg-6" style="padding: 80px 0;">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-4" style="color: #3C096C; font-size: 32px;">Login</h1>
                                    </div>
                                    <form class="user" action="loginproces" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="Username" name="username" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" placeholder="Password" name="password" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="role" id="exampleFormControlSelect1">
                                              <option value="">-- Pilih Level Pengguna --</option> 
                                              <option value="admin">Admin</option>
                                              <option value="mahasiswa">Mahasiswa</option>
                                            </select>
                                          </div>
                                        <button type="submit" name="login" class="btn btn-user btn-block" style="background-color: #3C096C; color: #F4F4F4; font-size: 14px; border: 1px solid #3C096C;">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
<!-- </body> -->

    <!-- Bootstrap core JavaScript-->
    <script src="../template/vendor/jquery/jquery.min.js"></script>
    <script src="../template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../template/js/sb-admin-2.min.js"></script>

