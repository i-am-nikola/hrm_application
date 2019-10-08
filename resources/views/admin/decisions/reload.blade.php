<div class="mb-2">
  <button class=" btn btn-primary" data-toggle="modal" data-target="#modal-create-decision" data-url={{ route('decisions.create') }}>
    <i class="fa fa-plus"></i> {{ t('decision.create') }}
  </button>
</div>
<div id="accordion">
  @if ($decisions->isNotEmpty())
  @foreach ($decisions as $key => $decision)
  @php
  $code = isset($decision->code) ? $decision->code : '';
  $oldSalary = isset($decision->old_salary) ? $decision->old_salary : '';
  $newSalary = isset($decision->new_salary) ? $decision->new_salary : '';
  $oldPosition = isset($decision->old_position) ? $decision->old_position : '';
  $newPosition = isset($decision->new_position) ? $decision->new_position : '';
  $effectiveDate = (isset($decision->effective_date) && $decision->effective_date !== null) ?
  $decision->effective_date->format('d/m/Y') : '';
  $signedDate = (isset($decision->sign_date) && $decision->sign_date !== null) ? $decision->sign_date->format('d/m/Y') :
  '';
  $leavingDate = (isset($decision->leaving_date) && $decision->leaving_date !== null) ?
  $decision->leaving_date->format('d/m/Y') : '';
  $status = $decision->status ? t('decision.signed') : t('decision.not_signed');
  $class = $decision->status ? 'info' : 'secondary';
  $reason = isset($decision->reason) ? $decision->reason : '';
  $formality = isset($decision->formality) ? $decision->formality : '';
  $oldDepartment = isset($decision->old_department) ? $decision->old_department : null;
  $newDepartment = isset($decision->new_department) ? $decision->new_department : null;
  @endphp
  <div class="card card-{{ $class }}">
    <div class="card-header p-1">
      <h4 class="card-title">
        <button class="btn text-white" data-toggle="collapse" data-target="#collapse-{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
          V/v: {{ $decision->decisionType->name }} <span class="small">({{ $status }})</span>
        </button>
      </h4>
    </div>
    <div id="collapse-{{ $key }}" class="panel-collapse collapse collapse-decision" data-parent="#accordion">
      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <p class="text-muted">{{ t('decision.number') . ': ' . $code }}</p>
            @if ($oldSalary && $newSalary)
            <p class="text-muted">{{ t('decision.old_salary') . ': ' . $oldSalary }}</p>
            <p class="text-muted">{{ t('decision.new_salary') . ': ' . $newSalary }}</p>
            @endif
            @if ($oldDepartment && $newDepartment)
            <p class="text-muted">{{ t('decision.old_department') . ': ' . getDepartmentNameById($oldDepartment) }}</p>
            <p class="text-muted">{{ t('decision.new_department') . ': ' . getDepartmentNameById($newDepartment) }}</p>
            @endif
            @if ($oldPosition && $newPosition)
            <p class="text-muted">{{ t('decision.old_position') . ': ' . $oldPosition }}</p>
            <p class="text-muted">{{ t('decision.new_position') . ': ' . $newPosition }}</p>
            @endif
            @if ($leavingDate)
            <p class="text-muted">{{ t('decision.leaving_date') . ': ' . $leavingDate }}</p>
            @endif
            @if ($reason)
            <p class="text-muted">{{ t('decision.reason') . ': ' . $reason }}</p>
            @endif
            @if ($formality)
            <p class="text-muted">{{ t('decision.formality') . ': ' . $formality }}</p>
            @endif
          </div>
          <div class="col-6">
            <p class="text-muted">{{ t('decision.status') . ': ' . $status }}</p>
            <p class="text-muted">{{ t('decision.sign_date') . ': ' . $signedDate }}</p>
            @if ($effectiveDate)
            <p class="text-muted">{{ t('decision.effective_date') . ': ' . $effectiveDate }}</p>
            @else
            <p class="text-muted">{{ t('decision.effective_date') . ': ' . 'Kể từ ngày ký' }}</p>
            @endif

          </div>
        </div>
      </div>

      <div class="card-footer">
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-decision-document" data-url={{ route('decisions.document', $decision->id) }}>
          <i class="fas fa-print"></i>
        </button>
        <button class="btn btn-warning btn-sm" id="js-contract-edit" data-toggle="modal" data-target="#modal-edit-decision" data-url={{ route('decisions.edit', $decision->id) }}>
          <i class="fas fa-pencil-alt"></i>
        </button>
        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirm-delete" data-url={{ route('decisions.destroy', $decision->id) }} }}>
          <i class="fas fa-trash"></i>
        </button>
      </div>
    </div>
  </div>
  @endforeach
</div>
@else
<div class="alert alert-warning">
  {{ t('decision.no_decision') }}
</div>
@endif