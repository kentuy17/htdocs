<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome Message</title>

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

  <link rel="stylesheet" href="{{ URL::asset('assets/welcome.css') }}">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>
<body class="hold-transition">
  <div>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card profile-card-1">
              <!-- <img src="https://images.pexels.com/photos/946351/pexels-photo-946351.jpeg?w=500&h=650&auto=compress&cs=tinysrgb" alt="profile-sample1" class="background" /> -->
              <img src="../assets/img/bg1.jpg" alt="profile-sample1" class="background" />
              <img src="{{ URL::asset('storage/'.$img.'.jpg') }}" alt="profile-image" class="profile" />
              <div class="card-content">
                <h2>@if($emp) {{$emp->name}} @else Welcome @endif<small>{{ now()->toTimeString() }}</small></h3>
                  <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
<!-- jQuery -->
<script src="{{ URL::asset('assets/js/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('assets/bower/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('assets/bower/js/adminlte.min.js') }}"></script>
</body>
</html>

