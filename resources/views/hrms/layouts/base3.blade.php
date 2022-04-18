<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> Human Resource Management System </title>
  <!-- <title> HRMS </title> -->
  <!-- <title>BrainPod</title> -->


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/css/fonts.googleapis.css') }}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/css/adminlte.min.css') }}">
  <link rel="icon" href="cropped-favicon-512-192x192.png?x55520" sizes="192x192" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/regular.min.css" integrity="sha512-YoxvmIzlVlt4nYJ6QwBqDzFc+2aXL7yQwkAuscf2ZAg7daNQxlgQHV+LLRHnRXFWPHRvXhJuBBjQqHAqRFkcVw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    #logo {
      background-position-y: center;
      background-size: contain;
      opacity: .8;
      max-width: 200px;
      align-content: center;
      display: grid;
    }
    .content-wrapper{
      background-image: url('assets/img/bg1.jpg');
    }

    /* .nav-item.menu-open {
      background-color: #dc3545;
    } */
    
  </style>
  <!-- <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/bs-stepper/css/bs-stepper.min.css') }}"> -->
  <!-- <link rel="stylesheet" href="{{ URL::asset('assets/bower/css/bootstrap.min.css') }}"> -->
  @stack('styles')
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('hrms.layouts.navbar.top')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link navbar-default">
      <img src="{{ URL::asset('assets/img/logo-shield.png') }}" class="brand-image img-circle elevation-3" style="opacity: .8"/>
      <span class="brand-text font-weight-bold">
      <img src="{{ URL::asset('assets/img/ac-logo-horizontal-300-mod.png') }}" style="background-position-y: center;background-size: contain; max-width: 150px !important;" />
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar sidebar-danger">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(\Auth::user()->employee->photo)
            <img src="{{\Auth::user()->employee->photo}}" class="img-circle elevation-2" alt="User Image">
          @else
            <img src="{{ URL::asset('assets/bower/img/not-set-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ \Auth::user()->employee->name }}</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @include('hrms.layouts.navbar.side-menu')
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
          @yield('crumbs')
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="{{ URL::asset('assets/js/jquery/jquery.min.js') }}"></script> <!-- jQuery -->
<script src="{{ URL::asset('assets/bower/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> <!-- Bootstrap 4 -->
<script src="{{ URL::asset('assets/bower/js/adminlte.min.js') }}"></script> <!-- AdminLTE App -->

<script>
  $('.nav-sidebar').addClass('nav-flat')
</script>

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="{{ URL::asset('assets/bower/plugins/chart.js/Chart.min.js') }}"></script> -->

<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ URL::asset('assets/bower/js/demo.js') }}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ URL::asset('assets/bower/js/pages/dashboard3.js') }}"></script> -->

@stack('scripts')

@yield('jsfunction')

</body>
</html>
