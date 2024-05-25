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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../template/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../template/css/style.css" rel="stylesheet">
    <link href="../template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for icons and text alignment -->
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-side sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    <img src="../template/img/login/lOGO1.png" alt="Sireksi Logo" style="width: 60px;">
                </div>
                <div class="sidebar-brand-text mx-3">
                    <img src="../template/img/login/lOGO2.png" alt="Sireksi Logo" style="width: 105px; margin-left: -10px; margin-top: 2px;">
                </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="nav-link pb-0" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Data Pengguna -->
            <li class="nav-item {{ request()->is('mahasiswa') ? 'active' : '' }}">
                <a class="nav-link pb-0" href="{{ route('mahasiswa') }}">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>Data Pengguna</span>
                </a>
            </li>

            <!-- Nav Item - Data Yudisiawan -->
            <li class="nav-item {{ request()->is('data-yudisiawan') ? 'active' : '' }}">
                <a class="nav-link collapsed pb-0" href="{{ route('data-yudisiawan') }}">
                    <i class="fas fa-user-graduate" aria-hidden="true"></i>
                    <span>Data Yudisiawan</span>
                </a>
            </li>

            <!-- Nav Item - Skripsi -->
            <li class="nav-item {{ request()->is('skripsi') || request()->is('kodeskripsi') ? 'active' : '' }}">                
                <a class="nav-link collapsed pb-0" href="" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-book" aria-hidden="true"></i>
                    <span>Skripsi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('skripsi') }}"><i class="fas fa-fw fa-book mr-1"></i> Data Skripsi</a>
                        <a class="collapse-item" href="{{ route('kodeskripsi') }}"><i class="fa fa-fw fa-server mr-1"></i> Data Kode Skripsi</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Program Studi -->
            <li class="nav-item {{ request()->is('prodi') ? 'active' : '' }}">
                <a class="nav-link pb-0" href="{{ route('prodi') }}">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    <span>Program Studi</span></a>
            </li>

            <!-- Nav Item - Dosen Pembimbing -->
            <li class="nav-item {{ request()->is('dospem') ? 'active' : '' }}">
                <a class="nav-link pb-0" href="{{ route('dospem') }}">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Dosen Pembimbing</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>

            <!-- Nav Item - Laporan -->
            <li class="nav-item mb-3 {{ request()->is('laporan-mahasiswa') || request()->is('laporan-konfir') ? 'active' : '' }}">                
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
                    <i class="fas fa-fw fa-solid fa-file"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseLaporan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar" style="width: 200px;">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('laporan-mahasiswa') }}">Laporan Data Pengguna</a>
                        <a class="collapse-item" href="{{ route('laporan-konfir') }}">Laporan Data Pengumpulan</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt">

            <!-- Heading -->
            <div class="sidebar-heading">
                USER
            </div>

            <!-- Nav Item - Profil Admin -->
            <li class="nav-item {{ request()->is('profiladmin') ? 'active' : '' }}">
                <a class="nav-link pb-0" href="{{ route('profiladmin') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>My Profile</span></a>
            </li>

            <!-- Nav Item - Ubah Password -->
            <li class="nav-item {{ request()->is('ubah-password') ? 'active' : '' }}">
                <a class="nav-link pb-0" href="{{ route('ubah-password') }}">
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
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    @if(Auth::check())
                                        {{ Auth::user()->nama }}
                                    @endif
                                </span>
                                <img class="img-profile rounded-circle" src="{{ Auth::check() && Auth::user()->foto ? asset('storage/foto-admin/' . Auth::user()->foto) : asset('template/img/default.jpg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profiladmin') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('homepage') }}" data-toggle="modal" data-target="#logoutModal">
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="{{ route('homepage') }}">OK</a>
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

    <!-- SweetAlert -->
    <link href="../template/sw/sweetalert2.min.css" rel="stylesheet">
    <script src="../template/sw/sweetalert2.min.js"></script>
    <script src="../template/sw/sweetalert2.all.min.js"></script>

    <!-- Datepicker -->
    <link href="../template/vendor/datepicker/css/datepicker.css" rel="stylesheet">
    <link href="../template/vendor/datepicker/css/datepicker.min.css" rel="stylesheet">

    <!-- Datepicker -->
    <script src="../template/vendor/datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Bootsrap-select -->
    <script src="../template/vendor/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Bootsrap-select -->
    <link href="../template/vendor/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
    <link href="../template/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">

    <script>
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
        });
    </script>

    <!-- datepicker -->
    <script>
        // date picker
        $('#datepicker-year').datepicker({
            format: "yyyy",
            orientation: "top auto",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });

        // date picker
        $('#datepicker-date').datepicker({
            format: "yyyy-mm-dd",
            orientation: "top auto",
            autoclose: true
        });

        // date picker
        $('#datepicker-date2').datepicker({
            format: "yyyy-mm-dd",
            orientation: "top auto",
            autoclose: true
        });
    </script>
</body>
</html>
