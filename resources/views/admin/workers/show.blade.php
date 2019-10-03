@extends('admin.layouts.master')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        @include('admin.workers._show_info')
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header p-1">
            <ul class="nav nav-pills">
              <li class="nav-item">
                <a class="active nav-link" href="#identity" data-toggle="tab">{{ t('worker.info') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#education" data-toggle="tab">{{ t('worker.education') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#record" data-toggle="tab">{{ t('worker.record') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contract" data-toggle="tab">{{ t('worker.contract') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#decision" data-toggle="tab">{{ t('worker.decision') }}</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane" id="identity">
                @include('admin.workers._show_identity')
              </div>
              <div class="tab-pane" id="education">
                @include('admin.workers._show_education')
              </div>
              <div class="tab-pane" id="record">
                @include('admin.workers._show_record')
              </div>
              <div class="tab-pane" id="contract" data-url={{ route('contracts.reload', isset($worker) ? $worker->id : '') }}}>
                @include('admin.workers._show_contract')
              </div>
              <div class="active tab-pane" id="decision" data-url={{ route('decisions.reload', isset($worker) ? $worker->id : '') }}>

              </div>
            </div>
          </div>
        </div>
        <div class="float-right mb-3">
          <a href="{{ route('workers.index') }}" class="text-muted">Quay lại</a>
        </div>
      </div>
    </div>
  </div>
</section>
@include('admin.shared._modal_confirm_delete')
@include('admin.contracts.create')
@include('admin.contracts.edit')
@include('admin.decisions.create')
@include('admin.decisions.edit')
@endsection
