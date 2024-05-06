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

    <!-- Custom styles for this page -->
    <link href="../template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-side sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="../template/img/login/lOGO SIREKSI.png" alt="Sireksi Logo" style="width: 185px; height: auto;">  
                </div>
            </a>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               MENU
            </div>

            @if(auth()->guard('mahasiswa')->user()->role == 1)
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="{{ route('dashboard2') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            @endif

            @if(auth()->guard('mahasiswa')->user()->role == 1)
            <!-- Nav Item - Konfirmasi Pengumpulan -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="{{ route('konfir-pengumpulan') }}">
                <i class="fas fa-fw fa-solid fa-check-circle" aria-hidden="true"></i>
                    <span>Konfirmasi Pengumpulan</span></a>
            </li>
            @endif

            @if(auth()->guard('mahasiswa')->user()->role == 2)
            <!-- Nav Item - Cari Rekomendasi -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="{{ route('detail-pengumpulan') }}">
                <i class="fas fa-fw fa-solid fa-file" aria-hidden="true"></i>
                    <span>Pengumpulan Skripsi</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!-- Heading -->
            <div class="sidebar-heading">
                USER
            </div>

            <!-- Nav Item - Profil Admin -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="{{ route('my-profil') }}">
                <i class="fas fa-fw fa-user"></i>
                    <span>My Profile</span></a>
            </li>

            <!-- Nav Item - Ubah Password -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="{{ route('change-password') }}">
                <i class="fas fa-fw fa-solid fa-key"></i>
                    <span>Ubah Password</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3 my-0">

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <a href="{{ route('homepage') }}" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali ke Beranda</a>
                        </div>
                    </div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                @if(Auth::check()) <!-- Mengecek apakah pengguna sudah login -->
                                    {{ auth()->guard('mahasiswa')->user()->nama }} <!-- Menampilkan nama pengguna yang login -->
                                @else
                                    Guest <!-- Menampilkan sebagai guest jika belum login -->
                                @endif
                            </span>
                            <!-- Menampilkan foto profil dari database jika tersedia, jika tidak, menampilkan foto default -->
                            <img class="img-profile rounded-circle" src="{{ Auth::check() && auth()->guard('mahasiswa')->user()->foto ? asset('storage/foto-mahasiswa/' . auth()->guard('mahasiswa')->user()->foto) : asset('template/img/undraw_profile.svg') }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('my-profil') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('login') }}" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('container')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ruang Baca FIP 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout Aplikasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin akan keluar dari aplikasi ini?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('login') }}">OK</a>
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
    
    

</body>

</html>