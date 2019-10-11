<div class="row">
  <div class="col-6">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">{{ t('dashboard.contracts.statistical') }}</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped" id="dashboard-contract">
          <thead>
            <tr>
              <th class="text-center">{{ t('th.index') }}</th>
              <th class="text-center">{{ t('contract.type') }}</th>
              <th class="text-center">{{ t('dashboard.contracts.quantity') }}</th>
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
        <h3 class="card-title">{{ t('dashboard.decisions.statistical') }}</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">{{ t('th.index') }}</th>
              <th class="text-center">{{ t('decision.type') }}</th>
              <th class="text-center">{{ t('dashboard.decisions.quantity') }}</th>
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
