<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZYFBJ69P0C"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-ZYFBJ69P0C');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Admin RSUD dr. M. Haulussy</title>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- ckeditor -->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.0.0/ckeditor5.css" crossorigin>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5-premium-features/45.0.0/ckeditor5-premium-features.css" crossorigin>
    <link rel="stylesheet" href="{{ asset('plugins/ckeditor/style.css') }}">
    {{-- toastr --}}
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- Material Icons CDN (for modern icons) -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3182ce;
            --secondary-color: #4299e1;
            --accent-color: #7f9cf5;
            --dark-color: #2d3748;
            --light-color: #f8fafc;
            --success-color: #38a169;
            --warning-color: #ecc94b;
            --danger-color: #e53e3e;
            --info-color: #4299e1;
        }

        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Improved sidebar styling */
        .main-sidebar {
            background: linear-gradient(180deg, #2c5282 0%, #3182ce 100%);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Active submenu styling - simplified */
        .sidebar-dark-primary .nav-treeview>.nav-item>.nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        /* Menu open state - simplified */
        .nav-item.menu-open > .nav-link {
            background: rgba(255, 255, 255, 0.05);
        }

        /* Brand styling */
        .brand-link {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
            padding: 12px 10px;
            display: flex;
            align-items: center;
            height: 60px;
            overflow: hidden;
        }

        .brand-image {
            max-height: 30px;
            margin-right: 5px;
        }

        .brand-text {
            font-weight: 600 !important;
            letter-spacing: 0.2px;
            font-size: 0.85rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* User panel styling */
        .user-panel {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
            padding: 15px 10px;
        }

        .user-panel .info p {
            font-weight: 500;
            margin-bottom: 0;
        }

        .user-panel .image img {
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        /* Navbar styling */
        .main-header {
            background: #fff;
            box-shadow: 0 1px 15px rgba(0, 0, 0, 0.05);
            border: none;
        }

        .nav-link {
            position: relative;
            transition: all 0.3s;
        }

        /* Improved menu icons */
        .nav-icon {
            margin-right: 8px !important;
            width: 20px;
            text-align: center;
        }

        /* Date display */
        .date-display {
            display: flex;
            align-items: center;
            background-color: #edf2f7;
            padding: 5px 12px;
            border-radius: 5px;
            margin-top: 5px;
        }

        .date-icon {
            font-size: 16px;
            color: #4a5568;
            margin-right: 6px;
        }

        .date-text {
            font-size: 13px;
            font-weight: 500;
            color: #4a5568;
        }

        /* Custom logout button */
        .btn-logout {
            background: linear-gradient(45deg, #e53e3e, #f56565);
            border: none;
            padding: 6px 16px;
            border-radius: 5px;
            color: white;
            font-weight: 500;
            transition: all 0.3s;
            box-shadow: 0 2px 5px rgba(229, 62, 62, 0.2);
            display: flex;
            align-items: center;
            height: 34px;
            margin-right: 10px;
            margin-top : 3px;
        }

        .btn-logout:hover {
            transform: translateY(-1px);
            box-shadow: 0 3px 8px rgba(229, 62, 62, 0.3);
        }

        .btn-logout i {
            font-size: 18px;
            margin-right: 6px;
        }

        .btn-logout span {
            font-size: 13px;
        }

        /* Content wrapper styling */
        .content-wrapper {
            background-color: #f8fafc;
        }

        /* Card styling */
        .card {
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            border: none;
        }

        .card-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 600;
        }


    </style>
    @yield('link')
</head>

@yield('style')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="material-icons-round">menu</i>
                    </a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-3">
                    <div class="date-display">
                        <i class="material-icons-round date-icon">today</i>
                        <span class="date-text">{{ date('d M Y') }}</span>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-0" href="/logout">
                        <button class="btn-logout">
                            <i class="material-icons-round">logout</i>
                            <span>Logout</span>
                        </button>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div class="brand-link">
                <img src="{{ asset('images/maluku.png') }}" class="brand-image">
                <span class="brand-text font-weight-light">RS dr. M. Haulussy</span>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <p class="d-block text-white">
                            <i class="material-icons-round mr-1" style="font-size: 14px; vertical-align: middle;">verified_user</i>
                            {{ Auth::user()->name }}
                        </p>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                                    <i class="nav-icon material-icons-round">dashboard</i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2 || Auth::user()->role_id === 3)
                            <li class="nav-item">
                                <a href="/bed" class="nav-link {{ request()->is('bed*') ? 'active' : '' }}">
                                    <i class="nav-icon material-icons-round">hotel</i>
                                    <p>
                                        Ketersediaan Bed
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                            <li class="nav-item {{ request()->is('article*') || request()->is('news*') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{ request()->is('article*') || request()->is('news*') ? 'active' : '' }}">
                                    <i class="nav-icon material-icons-round">article</i>
                                    <p>
                                        Postingan
                                        <i class="material-icons-round right" style="font-size: 18px;">keyboard_arrow_down</i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview pl-3">
                                    <li class="nav-item">
                                        <a href="/article" class="nav-link {{ request()->is('article*') ? 'active' : '' }}">
                                            <i class="nav-icon material-icons-round">description</i>
                                            <p>
                                                Artikel
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/news" class="nav-link {{ request()->is('news*') ? 'active' : '' }}">
                                            <i class="nav-icon material-icons-round">feed</i>
                                            <p>
                                                Berita
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @elseif (Auth::user()->role_id === 4)
                            <li class="nav-item">
                                <a href="/article" class="nav-link {{ request()->is('article*') ? 'active' : '' }}">
                                    <i class="nav-icon material-icons-round">description</i>
                                    <p>
                                        Artikel
                                    </p>
                                </a>
                            </li>
                        @elseif (Auth::user()->role_id === 5)
                            <li class="nav-item">
                                <a href="/news" class="nav-link {{ request()->is('news*') ? 'active' : '' }}">
                                    <i class="nav-icon material-icons-round">feed</i>
                                    <p>
                                        Berita
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2 || Auth::user()->role_id === 7)
                            <li class="nav-item">
                                <a href="/event" class="nav-link {{ request()->is('event*') ? 'active' : '' }}">
                                    <i class="nav-icon material-icons-round">photo_library</i>
                                    <p>
                                        Galeri Kegiatan
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                            <li class="nav-item {{ request()->is('room*') || request()->is('treatment*') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{ request()->is('room*') || request()->is('treatment*') ? 'active' : '' }}">
                                    <i class="nav-icon material-icons-round">payments</i>
                                    <p>
                                        Tarif
                                        <i class="material-icons-round right" style="font-size: 18px;">keyboard_arrow_down</i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview pl-3">
                                    <li class="nav-item">
                                        <a href="/room" class="nav-link {{ request()->is('room*') ? 'active' : '' }}">
                                            <i class="nav-icon material-icons-round">meeting_room</i>
                                            <p>
                                                Ruangan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/treatment" class="nav-link {{ request()->is('treatment*') ? 'active' : '' }}">
                                            <i class="nav-icon material-icons-round">healing</i>
                                            <p>
                                                Tindakan
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                            <li class="nav-item {{ request()->is('download*') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{ request()->is('download*') ? 'active' : '' }}">
                                    <i class="nav-icon material-icons-round">download</i>
                                    <p>
                                        Download
                                        <i class="material-icons-round right" style="font-size: 18px;">keyboard_arrow_down</i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview pl-3">
                                    <li class="nav-item">
                                        <a href="/download" class="nav-link {{ request()->is('download') || request()->is('download/create') || request()->is('download/*/edit') ? 'active' : '' }}">
                                            <i class="nav-icon material-icons-round">insert_drive_file</i>
                                            <p>
                                                File
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/download-category" class="nav-link {{ request()->is('download-category*') ? 'active' : '' }}">
                                            <i class="nav-icon material-icons-round">category</i>
                                            <p>
                                                Kategori Download
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2 || Auth::user()->role_id === 6)
                            <li class="nav-item">
                                <a href="/suggestion" class="nav-link {{ request()->is('suggestion*') ? 'active' : '' }}">
                                    <i class="nav-icon material-icons-round">lightbulb</i>
                                    <p>
                                        Kritik dan Saran
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                            <li class="nav-item">
                                <a href="/promkes" class="nav-link {{ request()->is('promkes*') ? 'active' : '' }}">
                                    <i class="nav-icon material-icons-round">local_hospital</i>
                                    <p>
                                        Promosi Kesehatan
                                    </p>
                                </a>
                            </li>
                        @endif

                        {{-- iklan --}}
                        @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2) {{-- Sesuaikan dengan role_id admin/superadmin Anda --}}
                        <li class="nav-item">
                            <a href="{{ route('iklan.index') }}" class="nav-link {{ request()->is('iklan*') ? 'active' : '' }}">
                                <i class="nav-icon material-icons-round">campaign</i> {{-- atau fas fa-ad --}}
                                <p>
                                    Manajemen Iklan
                                </p>
                            </a>
                        </li>
                        @endif
                        {{-- end of iklan --}}

                        @if (Auth::user()->role_id === 1)
                            <li class="nav-item">
                                <a href="/account" class="nav-link {{ request()->is('account*') ? 'active' : '' }}">
                                    <i class="nav-icon material-icons-round">people</i>
                                    <p>
                                        Akun
                                    </p>
                                </a>
                            </li>
                        @endif

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer" style="
            background: #f8f9fa;
            border-top: 1px solid #dee2e6;
            padding: 15px 30px;
            margin-left: 250px;
        ">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                 <div class="text-muted" style="font-size: 13px;">
                     Made with
                                <svg class="bi bi-suit-heart-fill" xmlns="http://https://w3.org/2000/svg"
                                    width="12" height="12" fill="#F95C19" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z">
                                    </path>
                                </svg>&nbsp;by&nbsp;
                                <a class="fw-bold text-info" href="https://www.instagram.com/rsud.dr.m.haulussy.official/"
                                    target="_blank">RSUD dr. M. Haulussy Ambon</a>
                 </div>
                 <div style="color: #6c757d; font-size: 13px;">
                     © 2025 - All rights reserved
                 </div>
             </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    {{-- toastr --}}
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="dist/js/pages/dashboard.js"></script> --}}

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/45.0.0/ckeditor5.umd.js" crossorigin></script>
    <script src="https://cdn.ckeditor.com/ckeditor5-premium-features/45.0.0/ckeditor5-premium-features.umd.js" crossorigin></script>
    <script src="https://cdn.ckbox.io/ckbox/2.6.1/ckbox.js" crossorigin></script>

    @yield('script')
</body>

</html>
