@extends('admin.layouts.master')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9">
        {!! Form::open(['route' => 'workers.store', 'method' => 'POST']) !!}
        {!! Form::hidden('user_id', (Auth::user()) ? Auth::user()->id : '') !!}
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="active nav-link" href="#info" data-toggle="tab">{{ t('worker.info') }}</a></li>
              <li class="nav-item"><a class="nav-link" href="#education" data-toggle="tab">{{ t('worker.education') }}</a></li>
              <li class="nav-item"><a class="nav-link" href="#record" data-toggle="tab">{{ t('worker.record') }}</a></li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">

              @include('admin.workers._form_info')

              @include('admin.workers._form_education')

              @include('admin.workers._form_record')

            </div>
          </div>
          <div class="card-footer">
            {!! Form::submit(t('action.save'), ['class' => 'btn btn-primary']) !!}
            <a href={{ route('workers.index') }} class="btn btn-secondary">{{ t('action.back') }}</a>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</section>
@include('admin.shared._notify')
@endsection
