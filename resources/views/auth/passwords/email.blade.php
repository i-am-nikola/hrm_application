@extends('admin.layouts.page')
@section('content')
<div class="login-box">
  <div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ t('password.forgot') }}</h3><br>
        <p class="text-muted mb-0">{{ t('password.content_forgot') }}</p>
    </div>
    <div class="card-body login-card-body pt-4">
      {!! Form::open(['route' => 'password.email', 'method' => 'POST']) !!}
      <div class="form-group">
        <div class="input-group">
          {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => t('login.email')]) !!}
          <div class="input-group-append">
            <div class="input-group-text"><i class="fas fa-envelope"></i></div>
          </div>
        </div>
        @include('admin.shared._validate_message', ['fillable' => 'email'])
      </div>
      <div class="row">
        <div class="col-12">
          {!! Form::submit(t('action.reset_password'), ['class' => 'btn btn-primary btn-block btn-flat']) !!}
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
