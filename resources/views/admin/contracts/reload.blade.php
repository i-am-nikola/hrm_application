<div class="row">
  <div class="col-12">
    <div class="mb-2">
      <button class=" btn btn-primary" data-toggle="modal" data-target="#modal-create-contract"
        data-url={{ route('contracts.store') }}>
        <i class="fa fa-plus"></i> {{ t('contract.create') }}
      </button>
    </div>
    @if ($contracts->isNotEmpty())
    <div class="dataTables_scroll">
      <table class="table table-bordered table-striped js-contract-table">
        <thead>
          <tr>
            <th class="text-center">{{ t('th.index') }}</th>
            <th class="text-center">{{ t('contract.code') }}</th>
            <th class="text-center">{{ t('contract.type') }}</th>
            <th class="text-center">{{ t('contract.salary') }}</th>
            <th class="text-center">{{ t('contract.effective_date') }}</th>
            <th class="text-center">{{ t('contract.expiry_date') }}</th>
            <th class="text-center">{{ t('contract.sign_date') }}</th>
            <th class="text-center">{{ t('contract.status') }}</th>
            <th class="text-center">{{ t('th.action') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($contracts as $key => $contract)
          @php
          $status = $contract->status ? t('contract.signed') : t('contract.not_signed');
          $class = $contract->status ? 'success' : 'secondary';
          @endphp
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $contract->code }}</td>
            <td>{{ $contract->contractType->name }}</td>
            <td>{{ $contract->salary }}</td>
            <td>{{ $contract->effective_date !== null ? $contract->effective_date->format('d/m/Y') : '' }}</td>
            <td>{{ $contract->expiry_date !== null ? $contract->expiry_date->format('d/m/Y') : '' }}</td>
            <td>{{ $contract->sign_date !== null ? $contract->sign_date->format('d/m/Y') : '' }}</td>
            <td><span class="badge badge-{{ $class }}">{{ $status }}</span></td>
            <td>
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-contract-document"
                data-url={{ route('contracts.document', $contract->id) }}>
                <i class="fas fa-print"></i>
              </button>
              <button class="btn btn-warning btn-sm" id="js-contract-edit" data-toggle="modal"
                data-target="#modal-edit-contract" data-url={{ route('contracts.edit', $contract->id) }}>
                <i class="fas fa-pencil-alt"></i>
              </button>
              <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirm-delete"
                data-id={{ $contract->id }} data-url={{ route('contracts.destroy', $contract->id) }}>
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @else
    <div class="alert alert-warning">
      {{ t('contract.no_contract') }}
    </div>
    @endif
  </div>
</div>
