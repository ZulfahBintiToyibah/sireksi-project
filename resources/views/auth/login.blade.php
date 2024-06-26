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
<style>
    .bg-gradient-secondary {
        background: linear-gradient(180deg, #6c757d 10%, #3C096C 100%);
        background-size: cover;
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
    }

    .card-body {
        padding: 2rem;
    }

    .input-group-text {
        background-color: #3C096C;
        color: white;
    }

    .btn-primary {
        background-color: #3C096C;
        border-color: #3C096C;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #3C096C;
        border-color: #3C096C;
    }

    .form-control {
        border-radius: 50px;
    }

    .input-group-text {
        border-radius: 50px 0 0 50px;
    }

    .input-group .form-control {
        border-radius: 0 50px 50px 0;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .text-center h1 {
        color: #3C096C;
        font-weight: 700;
    }
    .logo {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
    .logo img {
        width: 260px;
    }
    
</style>
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
                            <div class="col-lg-6 d-none d-lg-block" style="background-image: url('template/img/login/login_bg.png'); background-size: cover; padding: 150px 0;">
                                <div class="logo text-center">
                                    <img src="template/img/login/lOGO SIREKSI.png" alt="Sireksi Logo">
                                </div>
                            </div>
                            <div class="col-lg-6" style="padding: 75px 0;">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-4">Login</h1>
                                    </div>
                                    @if(session('error'))
                                    <div class="alert alert-danger" style="font-size: 14px;">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    @if(session('success'))
                                    <div class="alert alert-success" style="font-size: 14px;">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    <form class="user" action="loginproces" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text px-3"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text px-3"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                </div>
                                                <select class="form-control" name="role" id="role">
                                                    <option value="">Pilih Level Pengguna</option>
                                                    <option value="admin">Administrator</option>
                                                    <option value="mahasiswa">Mahasiswa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" style="font-size: 15px">Login</button>
                                    </form>                                    
                                </div>
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
    <!-- SweetAlert -->
    <link href="../template/sw/sweetalert2.min.css" rel="stylesheet">
    <script src="../template/sw/sweetalert2.min.js"></script>
    <script src="../template/sw/sweetalert2.all.min.js"></script>

    <!-- Script SweetAlert -->
    <script src="../template/sw/sweetalert2.min.js"></script>
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
            title: "Error!",
            text: "{{ session('error') }}",
            icon: "error",
            confirmButtonText: "OK"
        });
    </script>
    @endif

</body>

</html>
