@if ($user)
@php
$avatar = $user->avatar;
$name = $user->name ? $user->name : '';
$email = $user->email ? $user->email : '';
$role = $user->role->name ? $user->role->name : '';
@endphp
@endif
@extends('admin.layouts.master')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src={{ asset('assets/img/' . $avatar) }}
                alt="User profile picture">
            </div>
            <h3 class="profile-username text-center">{{ $name }}</h3>
            <p class="text-muted text-center">{{ $email }}</p>

            <a href="#" class="btn btn-primary btn-block"><b>Đổi avatar</b></a>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#profile"
                  data-toggle="tab">{{ t('profile.info') }}</a></li>
              <li class="nav-item"><a class="nav-link" href="#password"
                  data-toggle="tab">{{ t('profile.change_password') }}</a></li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="profile">
                @include('admin.profile._profile')
              </div>
              <div class="tab-pane" id="password">
                @include('admin.profile._change_password')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
