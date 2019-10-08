<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user"></i></span>
      <div class="info-box-content">
        <ul class="nav flex-column">
          <li class="nav-item">
            {{ t('dashboard.users.count') }}
            <span class="float-right badge bg-primary">{{ countUsers() }}</span>
          </li>
          <li class="nav-item">
            {{ t('dashboard.users.count_active') }}
            <span class="float-right badge bg-info">{{ countActiveUsers() }}</span>
          </li>
          <li class="nav-item">
            {{ t('dashboard.users.count_inactive') }}
            <span class="float-right badge bg-warning">{{ countInactiveUsers() }}</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
      <div class="info-box-content">
        <ul class="nav flex-column">
          <li class="nav-item">
            {{ t('dashboard.workers.count') }}
            <span class="float-right badge bg-primary">{{ countWorkers() }}</span>
          </li>
          <li class="nav-item">
            {{ t('dashboard.workers.count_official') }}
            <span class="float-right badge bg-info">{{ countOfficialWorkers() }}</span>
          </li>
          <li class="nav-item">
            {{ t('dashboard.workers.count_probationary') }}
            <span class="float-right badge bg-warning">{{ countProbationaryWorkers() }}</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-contract"></i></span>
      <div class="info-box-content">
        <ul class="nav flex-column">
          <li class="nav-item">
            {{ t('dashboard.contracts.count') }}
            <span class="float-right badge bg-primary">{{ countContracts() }}</span>
          </li>
          <li class="nav-item">
            {{ t('dashboard.contracts.count_signed') }}
            <span class="float-right badge bg-info">{{ countSignedContracts() }}</span>
          </li>
          <li class="nav-item">
            {{ t('dashboard.contracts.count_unsigned') }}
            <span class="float-right badge bg-warning">{{ countUnsignedContracts() }}</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-address-book"></i></span>
        <div class="info-box-content">
          <ul class="nav flex-column">
            <li class="nav-item">
              {{ t('dashboard.decisions.count') }}
              <span class="float-right badge bg-primary">{{ countDecisions() }}</span>
            </li>
            <li class="nav-item">
              {{ t('dashboard.decisions.count_signed') }}
              <span class="float-right badge bg-info">{{ countSignedDecisions() }}</span>
            </li>
            <li class="nav-item">
              {{ t('dashboard.decisions.count_unsigned') }}
              <span class="float-right badge bg-warning">{{ countUnsignedDecisions() }}</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
</div>
