<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>HRM</title>
  <link rel="stylesheet" href="{{ mix('assets/css/vendor.css') }}">
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    @include('admin.layouts.navbar')
    @include('admin.layouts.sidebar')

    <div class="content-wrapper">
      @include('admin.shared._breadcrumb')

      @yield('content')

    </div>

    <aside class="control-sidebar control-sidebar-dark"></aside>

    @include('admin.layouts.footer')
  </div>
  <script src="{{ mix('assets/js/vendor.js') }}"></script>
</body>

</html>
