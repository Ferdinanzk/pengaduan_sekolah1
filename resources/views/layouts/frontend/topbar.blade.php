<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FlexStart Bootstrap Template - Index</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('ok/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('ok/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('ok/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('ok/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('ok/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('ok/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('ok/assets/vendor/remixicon/remixicon.css" rel="stylesheet') }}">
  <link href="{{ asset('ok/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('ok/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.12.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('ok/assets/img/logo.png') }}" alt="">
        <span>Pengaduan Sekolah</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul> @if (Route::has('login'))
@auth
          <li><a class="nav-link scrollto active" href="{{ url('/home') }}">Home</a></li>
@else
          <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
          
@endauth
@endif

<li><a class="nav-link scrollto" href="#contact">Pengaduan Sekolah</a></li>
<li><a class="nav-link scrollto" href="{{url('/profile')}}">Profile</a></li>
<li><a class="nav-link scrollto" href="{{url('/listlapor')}}">list laporan</a></li>
</ul>



        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>