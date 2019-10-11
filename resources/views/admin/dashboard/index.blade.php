@extends('admin.layouts.master')
@section('content')
<section class="content js-dashboard" data-url={{ route('dashboard.index') }}>
  <div class="container-fluid">
    <div class="row mb-3">
      <div class="col-md-3">
        {!!Form::select('month', months(), '', ['class' => 'form-control month-control', 'data-url' =>
        route('dashboard.dashboard')]) !!}
      </div>
      <div class="col-md-3">
        {!! Form::select('year', years(), now()->year, ['class' => 'form-control year-control', 'data-url' =>
        route('dashboard.dashboard')]) !!}
      </div>
    </div>
    @include('admin.dashboard._count')
    @include('admin.dashboard._chart')
    @include('admin.dashboard._count_contract_decision')
  </div>
</section>
@include('admin.shared._notify')
@endsection
