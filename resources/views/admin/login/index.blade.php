@extends('admin.layouts.page')
@section('content')
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body pt-4">
      {!! Form::open(['route' => 'authenticate', 'method' => 'POST', 'id' => 'login-form']) !!}
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
        <div class="col-7">
          <div>
            {!! Form::checkbox('remember') !!}
            {!! Form::label('remember', t('login.remember_me')) !!}
          </div>
        </div>
        <div class="col-5">
          {!! Form::submit(t('action.login'), ['class' => 'btn btn-primary btn-block btn-flat']) !!}
        </div>
      </div>
      {!! Form::close() !!}
      <p class="mb-1">
        <a href={{ route('password.request') }}>{{ t('login.forgot_password') }}</a>
      </p>
    </div>
  </div>
  @include('admin.login.demo')
</div>
@endsection
