<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <link rel="shortcut icon" href="{{ asset(company()->photo) }}" type="image/x-icon">

  @stack('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('backends.layouts.navbar')
  @include('backends.layouts.sidebar')

  <div class="content-wrapper">
    <div class="content pt-4">
      <div class="container-fluid">
        @include('backends.alerts.index')
        @yield('content')
      </div>
    </div>
  </div>

  @include('backends.layouts.footer')
</div>


<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

@stack('js')
</body>
</html>
