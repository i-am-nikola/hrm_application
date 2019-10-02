@if ($contracts->isNotEmpty())
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
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#contract-document"><i class="fas fa-print"></i></button>
    <button class="btn btn-warning btn-sm" id="js-contract-edit" data-toggle="modal" data-target="#modal-edit-contract"
      data-url={{ route('contracts.edit', $contract->id) }}><i class="fas fa-pencil-alt"></i></button>
    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirm-delete"
      data-id={{ $contract->id }} data-url={{ route('contracts.destroy', $contract->id) }}>
      <i class="fas fa-trash"></i>
    </button>
  </td>
</tr>
@endforeach
@else
<tr class="js-no-contract">
  <td colspan="9">{{ t('contract.no_contract') }}</td>
</tr>
@endif
