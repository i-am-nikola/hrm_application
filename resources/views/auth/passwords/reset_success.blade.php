@extends('admin.layouts.page')
@section('content')
<div class="login-box">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ t('password.reset_success') }}</h3><br>
      <p class="text-muted mb-0">{{ t('password.reset_success_content') }}</p>
    </div>
    <div class="card-body login-card-body pt-4">
      <div class="row">
        <div class="col-12">
          <a href={{ route('login') }} class="btn btn-primary btn-block btn-flat">{{ t('action.back_login') }}</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
