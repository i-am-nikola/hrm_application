@extends('admin.layouts.master')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ t('permission.title') }}</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">{{ t('th.index') }}</th>
                <th class="text-center">{{ t('permission.name') }}</th>
                @if ($roles->isNotEmpty())
                @foreach ($roles as $role)
                <th class="text-center">{{ $role->name }}</th>
                @endforeach
                @endif
              </tr>
            </thead>
            <tbody>
              @include('admin.permissions._tbody')
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
