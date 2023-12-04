<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("plugins/fontawesome-free/css/all.min.css") }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset("plugins/jqvmap/jqvmap.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("dist/css/adminlte.min.css") }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset("plugins/daterangepicker/daterangepicker.css") }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset("plugins/summernote/summernote-bs4.min.css") }}">
  {{-- toastr --}}
  <link rel="stylesheet" href="{{ asset("plugins/toastr/toastr.min.css") }}">
  @yield("link")
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mb-3">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" href="/logout" role="button">
         <button class="btn btn-danger">Logout</button>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset("images/maluku.png") }}" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">| RSUD Dr. M Haulussy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/post" class="nav-link">
                  <i class="nav-icon fas fa-newspaper"></i>
                  <p>
                   Postingan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/bed" class="nav-link">
                  <i class="nav-icon fas fa-bed"></i>
                  <p>
                    Ketersediaan Bed
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Akun
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview pl-3">
                  <li class="nav-item">
                    <a href="/admins/" class="nav-link">
                      <i class="nav-icon fas fa-lock"></i>
                      <p>Admin</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/users/" class="nav-link">
                      <i class="nav-icon fas fa-user"></i>
                      <p>Pengguna Biasa</p>
                    </a>
                  </li>
                </ul>
              </li>
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
            <h1 class="m-0">@yield("title")</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @yield("content")
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright 2023 RSUD Dr. M Haulussy.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  
  <!-- jQuery -->
  <script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>
  {{-- toastr --}}
  <script src="{{ asset("plugins/toastr/toastr.min.js") }}"></script>
  <script src="{{ asset("plugins/sweetalert2/sweetalert2.min.js") }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset("plugins/jquery-ui/jquery-ui.min.js") }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset("plugins/chart.js/Chart.min.js") }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset("plugins/sparklines/sparkline.js") }}"></script>
  <!-- JQVMap -->
  <script src="{{ asset("plugins/jqvmap/jquery.vmap.min.js") }}"></script>
  <script src="{{ asset("plugins/jqvmap/maps/jquery.vmap.usa.js") }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset("plugins/jquery-knob/jquery.knob.min.js") }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset("plugins/moment/moment.min.js") }}"></script>
  <script src="{{ asset("plugins/daterangepicker/daterangepicker.js") }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}"></script>
  <!-- Summernote -->
  <script src="{{ asset("plugins/summernote/summernote-bs4.min.js") }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset("dist/js/adminlte.js") }}"></script>
  <!-- AdminLTE for demo purposes -->
  {{-- <script src="dist/js/pages/dashboard.js"></script> --}}
  @yield("script")
</body>
</html>
