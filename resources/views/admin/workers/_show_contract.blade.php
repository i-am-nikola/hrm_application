<div class="row">
  <div class="col-12">
    <div class="mb-2">
      <button class=" btn btn-primary" data-toggle="modal" data-target="#modal-create-contract" data-url={{ route('contracts.store') }}>
        <i class="fa fa-plus"></i> {{ t('contract.create') }}
      </button>
    </div>
    <div class="dataTables_scroll">
      <table class="table table-bordered table-striped js-contract-table">
        <thead>
          <tr>
            <th>{{ t('th.index') }}</th>
            <th>{{ t('contract.code') }}</th>
            <th>{{ t('contract.type') }}</th>
            <th>{{ t('contract.salary') }}</th>
            <th>{{ t('contract.effective_date') }}</th>
            <th>{{ t('contract.expiry_date') }}</th>
            <th>{{ t('contract.sign_date') }}</th>
            <th>{{ t('contract.status') }}</th>
            <th>{{ t('th.action') }}</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>
