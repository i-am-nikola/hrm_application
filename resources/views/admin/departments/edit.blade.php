@extends('admin.layouts.master')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ t('department.update') }}</h3>
          </div>
          {!! Form::open(['route' => ['departments.update', $department->id], 'method' => 'PUT', 'class' => 'app-form']) !!}

          @include('admin.departments._form')

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>
@include('admin.shared._notify')
@endsection
