<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Login</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("plugins/fontawesome-free/css/all.min.css") }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("dist/css/adminlte.min.css") }}">
  <link rel="stylesheet" href="{{ asset("plugins/toastr/toastr.min.css") }}">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo pb-4 mb-0">
      <img src="{{ asset('images/maluku.png') }}" width="50" height="50"> <b>RSUD </b>dr. M. Haulussy</a>
    </div>
    <!-- /.login-logo -->
    <div class="card p-4">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Login untuk memulai sesi anda</p>
  
        <form method="POST" action="/login">
          @csrf
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <button type="submit" class="btn btn-success btn-block">Sign In</button>
          </div>
        </form>
        
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
  
  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset("dist/js/adminlte.min.js") }}"></script>

  <script src="{{ asset("plugins/toastr/toastr.min.js") }}"></script>
  <script src="{{ asset("plugins/sweetalert2/sweetalert2.min.js") }}"></script>
  </body>
</html>
