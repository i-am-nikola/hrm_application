<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ t('action.login') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href={{ mix('assets/css/vendor.css') }}>
  <script src="{{ mix('assets/js/vendor.js') }}"></script>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card">
      <div class="card-body login-card-body pt-4">
        {!! Form::open(['route' => 'authenticate', 'method' => 'POST']) !!}
        <div class="form-group">
          <div class="input-group">
            {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => t('login.email')]) !!}
            <div class="input-group-append">
              <div class="input-group-text"><i class="fas fa-envelope"></i></div>
            </div>
          </div>
          @include('admin.shared._validate_message', ['fillable' => 'email'])
        </div>
        <div class="form-group">
          <div class="input-group">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => t('login.password')]) !!}
            <div class="input-group-append">
              <div class="input-group-text"><i class="fas fa-lock"></i></div>
            </div>
          </div>
          @include('admin.shared._validate_message', ['fillable' => 'password'])
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              {!! Form::checkbox('remember') !!}
              {!! Form::label('remember', t('login.remember_me')) !!}
            </div>
          </div>
          <div class="col-4">
            {!! Form::submit(t('action.login'), ['class' => 'btn btn-primary btn-block btn-flat']) !!}
          </div>
        </div>
        </form>
        <p class="mb-1">
          <a href="#">{{ t('login.forgot_password') }}</a>
        </p>
      </div>
    </div>
  </div>
  @include('admin.shared._notify')
</body>

</html>
