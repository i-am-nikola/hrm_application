@extends('admin.layouts.master')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <span class="float-right">
            <a href="{{ route('departments.create') }}" class=" btn btn-primary">
              <i class="fa fa-plus"></i> {{ t('action.create') }}
            </a>
          </span>
          <h3 class="card-title">{{ t('department.list') }}</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped data-table">
            <thead>
              <tr>
                <th class="text-center">{{ t('th.index') }}</th>
                <th class="text-center">{{ t('department.name') }}</th>
                <th class="text-center">{{ t('department.count') }}</th>
                <th class="text-center">{{ t('th.action') }}</th>
              </tr>
            </thead>
            <tbody>
              @include('admin.departments._tbody')
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
