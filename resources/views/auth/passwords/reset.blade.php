@extends('admin.layouts.page')
@section('content')
<div class="login-box">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ t('password.reset') }}</h3><br>
    </div>
    <div class="card-body login-card-body pt-4">
      {!! Form::open(['route' => 'password.update', 'method' => 'POST']) !!}
      {!! Form::hidden('token', $token) !!}
      <div class="form-group mb-2">
        {!! Form::label('password', t('password.email')) !!}
        <div class="input-group">
          {!! Form::text('email', $email, ['class' => 'form-control']) !!}
          <div class="input-group-append">
            <div class="input-group-text"><i class="fas fa-envelope"></i></div>
          </div>
        </div>
        @include('admin.shared._validate_message', ['fillable' => 'email'])
      </div>
      <div class="form-group mb-2">
        {!! Form::label('password', t('password.new')) !!}
        <div class="input-group">
          {!! Form::password('password', ['class' => 'form-control']) !!}
          <div class="input-group-append">
            <div class="input-group-text"><i class="fas fa-lock"></i></div>
          </div>
        </div>
        @include('admin.shared._validate_message', ['fillable' => 'password'])
      </div>
      <div class="form-group">
        {!! Form::label('password', t('password.confirm')) !!}
        <div class="input-group">
          {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
          <div class="input-group-append">
            <div class="input-group-text"><i class="fas fa-lock"></i></div>
          </div>
        </div>
        @include('admin.shared._validate_message', ['fillable' => 'password_confirmation'])
      </div>
      <div class="row">
        <div class="col-12">
          {!! Form::submit(t('action.confirm'), ['class' => 'btn btn-primary btn-block btn-flat']) !!}
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
