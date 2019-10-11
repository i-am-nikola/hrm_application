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

          @include('admin.workers._filter')

        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped data-table workers-table">
            <thead>
              <tr>
                <th class="text-center">{{ t('th.index') }}</th>
                <th class="text-center">{{ t('worker.code') }}</th>
                <th class="text-center">{{ t('worker.name') }}</th>
                <th class="text-center">{{ t('worker.phone') }}</th>
                <th class="text-center">{{ t('worker.staring_date') }}</th>
                <th class="text-center">{{ t('worker.department') }}</th>
                <th class="text-center">{{ t('worker.position') }}</th>
                <th class="text-center">{{ t('th.status') }}</th>
                <th class="text-center">{{ t('th.action') }}</th>
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
