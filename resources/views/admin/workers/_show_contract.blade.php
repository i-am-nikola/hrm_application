<div class="row">
  <div class="col-12">
    <div class="mb-2">
        <a href="#" class=" btn btn-primary">
          <i class="fa fa-plus"></i> {{ t('contract.create') }}
        </a>
    </div>
    <div class="dataTables_scroll">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>{{ t('th.index') }}</th>
            <th>{{ t('contract.code') }}</th>
            <th>{{ t('contract.type') }}</th>
            <th>{{ t('contract.effective_date') }}</th>
            <th>{{ t('contract.expiry_date') }}</th>
            <th>{{ t('contract.delay') }}</th>
            <th>{{ t('contract.status') }}</th>
            <th>{{ t('th.action') }}</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Trident</td>
            <td>Win 95+</td>
            <td> 4</td>
            <td>X</td>
            <td>Trident</td>
            <td>Win 95+</td>
            <td>4</td>
            <td>
              <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-print"></i></a>
              <a class="btn btn-warning btn-sm" href="#"><i class="fas fa-pencil-alt"></i></a>
              <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirm-delete">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
