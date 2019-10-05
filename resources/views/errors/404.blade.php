<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>404</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href={{ mix('assets/css/vendor.css') }}>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <section class="content mt-5 p-5">
      <div class="error-page">
        <h2 class="headline text-danger">404</h2>
        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> {{ t('404.header') }}</h3>
          <p>{{ t('404.body') }}</p>
          <a href={{ route('login') }} class="btn btn-primary">{{ t('404.footer') }}</a>
        </div>
      </div>
    </section>
  </div>
</body>

</html>
