@extends('admin.layouts.master')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <span class="float-right">
            <a href="{{ route('workers.create') }}" class=" btn btn-primary">
              <i class="fa fa-plus"></i> {{ t('action.create') }}
            </a>
          </span>
          <h3 class="card-title">{{ t('worker.list') }}</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped data-table">
            <thead>
              <tr>
                <th>{{ t('th.index') }}</th>
                <th>{{ t('worker.code') }}</th>
                <th>{{ t('worker.name') }}</th>
                <th>{{ t('worker.phone') }}</th>
                <th>{{ t('worker.staring_date') }}</th>
                <th>{{ t('th.status') }}</th>
                <th>{{ t('th.action') }}</th>
              </tr>
            </thead>
            <tbody>
              @include('admin.workers._tbody')
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@include('admin.shared._modal_confirm_delete')
@include('admin.shared._notify')
@endsection
