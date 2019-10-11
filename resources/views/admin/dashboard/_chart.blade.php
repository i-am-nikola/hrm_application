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
            <canvas id="js-department-chart" height="230" style="height: 230px;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
