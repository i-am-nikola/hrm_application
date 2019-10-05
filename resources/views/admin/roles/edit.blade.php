@extends('admin.layouts.master')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ t('role.update') }}</h3>
          </div>
          {!! Form::open(['route' => ['roles.update', $role->id], 'method' => 'PUT', 'class' => 'role-form']) !!}

          @include('admin.roles._form')

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>
@include('admin.shared._notify')
@endsection
