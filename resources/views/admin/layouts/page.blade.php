<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HRM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href={{ mix('assets/css/vendor.css') }}>
  <link rel="stylesheet" href={{ mix('assets/css/app.css') }}}>
  <script src="{{ mix('assets/js/vendor.js') }}"></script>
</head>

<body class="hold-transition full-page">

  @yield('content')

  @include('admin.shared._notify')
</body>

</html>
