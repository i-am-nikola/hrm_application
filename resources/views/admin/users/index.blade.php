@extends('admin.layouts.master')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <span class="float-right">
            <a href="{{ route('users.create') }}" class=" btn btn-primary">
              <i class="fa fa-plus"></i> {{ t('action.create') }}
            </a>
          </span>
          <h3 class="card-title">{{ t('user.list') }}</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped data-table user-table">
            <thead>
              <tr>
                <th class="text-center">{{ t('th.index') }}</th>
                <th class="text-center">{{ t('user.avatar') }}</th>
                <th class="text-center">{{ t('user.name') }}</th>
                <th class="text-center">{{ t('user.email') }}</th>
                <th class="text-center">{{ t('user.role') }}</th>
                <th class="text-center">{{ t('th.status') }}</th>
                <th class="text-center">{{ t('th.action') }}</th>
              </tr>
            </thead>
            <tbody>
              @include('admin.users._tbody')
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
