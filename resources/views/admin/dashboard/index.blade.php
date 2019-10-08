@extends('admin.layouts.master')
@section('content')
<section class="content js-dashboard" data-url={{ route('dashboard.index') }}>
  <div class="container-fluid">
    <div class="row mb-3">
      <div class="col-md-3">
        {!!Form::select('month', months(), '', ['class' => 'form-control month-control', 'data-url' => route('dashboard.dashboard')]) !!}
      </div>
      <div class="col-md-3">
        {!! Form::select('year', years(), now()->year, ['class' => 'form-control year-control', 'data-url' => route('dashboard.dashboard')]) !!}
      </div>
    </div>
    @include('admin.dashboard._count')
    <div id="dashboard-reload" data-url={{ route('dashboard.reload') }}>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header d-flex p-0">
              <h3 class="card-title p-3">
                <i class="fas fa-chart-pie mr-1"></i>
                {{ t('dashboard.chart') }}
              </h3>
              <ul class="nav nav-pills ml-auto p-2">
                <li class="nav-item">
                  <a class="nav-link active" href="#time-chart" data-toggle="tab">{{ t('dashboard.time') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#department-chart" data-toggle="tab">{{ t('dashboard.department') }}</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content p-0">
                <div class="chart tab-pane active" id="time-chart" style="position: relative; height: 300px;">
                  <canvas id="js-time-chart" style="height:230px; min-height:230px"></canvas>
                </div>
                <div class="chart tab-pane" id="department-chart" style="position: relative; height: 300px;">
                  <canvas id="js-department-chart" height="300" style="height: 300px;"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">{{ t('contract.total') }}</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped" id="dashboard-contract">
                <thead>
                  <tr>
                    <th class="text-center">{{ t('th.index') }}</th>
                    <th class="text-center">{{ t('contract.type') }}</th>
                    <th class="text-center">{{ t('contract.quantity') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($contractTypes->isNotEmpty())
                  @foreach ($contractTypes as $key => $contractType)
                  <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $contractType->name }}</td>
                    <td class="text-center" id="contract_type_{{ $contractType->id }}">text</td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{ t('decision.total') }}</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center">{{ t('th.index') }}</th>
                    <th class="text-center">{{ t('decision.type') }}</th>
                    <th class="text-center">{{ t('decision.quantity') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($decisionTypes->isNotEmpty())
                  @foreach ($decisionTypes as $key => $decisionType)
                  <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $decisionType->name }}</td>
                    <td class="text-center" id="decision_type_{{ $decisionType->id }}">text</td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@include('admin.shared._notify')
@endsection
