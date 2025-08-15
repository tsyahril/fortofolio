<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }} | @yield('title', 'Dashboard')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('dh-fronend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('dh-fronend/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body id="page-top">

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3 text-white">Admin</div>
        </a>

        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <hr class="sidebar-divider">

        <!-- Nav Item - Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#collapseMenu"
               aria-expanded="true" aria-controls="collapseMenu">
                <i class="fas fa-fw fa-cog"></i>
                <span>Utama</span>
            </a>
            <div id="collapseMenu" class="collapse" aria-labelledby="headingMenu" data-parent="#accordionSidebar">
                <div class="bg-light py-2 collapse-inner rounded">
                    <h6 class="collapse-header text-dark">Halaman Utama</h6>
                    <a class="collapse-item text-dark" href="{{ route('informasi.index') }}">Informasi</a>
                    <a class="collapse-item text-dark" href="{{ route('project.index') }}">Project</a>
                    <a class="collapse-item text-dark" href="{{ route('skill.index') }}">Skill</a>
                </div>
            </div>
        </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline small">{{ Auth::user()->name ?? 'Admin' }}</span>
                            <img class="img-profile rounded-circle" src="https://via.placeholder.com/200">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm ml-3">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->

            <!-- Page Content -->
            <div class="container-fluid" data-aos="fade-up">
                @yield('content')
            </div>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto text-dark">
                    <span>Copyright &copy; Your Website 2025</span>
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
    <i class="fas fa-angle-up text-dark"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yakin untuk logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih logout jika ingin keluar</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('dh-fronend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dh-fronend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dh-fronend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('dh-fronend/js/sb-admin-2.min.js') }}"></script>

<!-- AOS Animation JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

@stack('scripts')
</body>
</html>
