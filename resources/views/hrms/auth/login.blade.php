<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Human Resource Management System | Login v2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/css/fonts.googleapis.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <!-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/css/adminlte.min.css') }}">
  <link rel="icon" href="../cropped-favicon-512-192x192.png?x55520" sizes="192x192" />
  <style>
    body.login-page {
      background-image: url('assets/img/bg1.jpg');
      background-position: center center;
      background-repeat: no-repeat;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1">
        <img src="{{ URL::asset('assets/img/ac-logo-horizontal-300.png') }}" style="background-position-y: center;background-size: contain;width: auto !important;" />
      </a>
    </div>
    <div class="card-body">
      <h2 class="login-box-msg">HRMS Admin Login</h2>
      {!! Form::open() !!}
        @if (session('message'))
          <div class="alert {{session('class')}}">
              {{ session('message') }}
          </div>
        @endif
        <div class="input-group mb-3">
          <input name="email" id="email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      {!! Form::close() !!}

      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0" id="register">
        <a href="#" class="text-center">Request an Account</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ URL::asset('assets/js/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('assets/bower/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('assets/bower/js/adminlte.min.js') }}"></script>
</body>
</html>
