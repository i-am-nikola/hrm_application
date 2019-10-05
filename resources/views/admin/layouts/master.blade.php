@php
$avatar = (Auth::user()) ? Auth::user()->avatar : 'avatar6.png';
$name = (Auth::user()) ? Auth::user()->name : '';
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>HRM</title>
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
  <link rel="stylesheet" href="{{ mix('assets/css/vendor.css') }}">
  <link rel="stylesheet" href="{{ mix('assets/css/app.css') }}">
  <script src="{{ mix('assets/js/vendor.js') }}"></script>
  <script src="{{ mix('assets/js/app.js') }}"></script>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    @include('admin.layouts.navbar')
    @include('admin.layouts.sidebar')

    <div class="content-wrapper">
      @include('admin.shared._breadcrumb')

      @yield('content')

    </div>

    @include('admin.layouts.footer')
  </div>
</body>

</html>
