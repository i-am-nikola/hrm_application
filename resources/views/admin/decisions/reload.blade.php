<div class="mb-2">
  <button class=" btn btn-primary" data-toggle="modal" data-target="#modal-create-decision"
    data-url={{ route('decisions.create') }}>
    <i class="fa fa-plus"></i> {{ t('decision.create') }}
  </button>
</div>
<div id="accordion">
  @if ($decisions->isNotEmpty())
  @foreach ($decisions as $key => $decision)
  @php
  $code = $decision->code ? $decision->code : '';
  $oldSalary = $decision->old_salary ? $decision->old_salary : '';
  $newSalary = $decision->new_salary ? $decision->new_salary : '';
  $oldPosition = $decision->old_position ? $decision->old_position : '';
  $newPosition = $decision->new_position ? $decision->new_position : '';
  $status = $decision->status ? t('decision.signed') : t('decision.not_signed');
  $class = $decision->status ? 'info' : 'secondary';
  $reason = $decision->reason ? $decision->reason : '';
  $formality = $decision->formality ? $decision->formality : '';
  $oldDepartment = $decision->old_department ? $decision->old_department : null;
  $newDepartment = $decision->new_department ? $decision->new_department : null;
  $effectiveDate = $decision->effective_date ? $decision->effective_date->format('d/m/Y'): '';
  $signedDate = $decision->sign_date ? $decision->sign_date->format('d/m/Y') : '';
  $leavingDate = $decision->leaving_date ? $decision->leaving_date->format('d/m/Y') : '';
  @endphp
  <div class="card card-{{ $class }}">
    <div class="card-header p-1">
      <h4 class="card-title">
        <button class="btn text-white" data-toggle="collapse" data-target="#collapse-{{ $key }}" aria-expanded="true"
          aria-controls="collapse{{ $key }}">
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
            @endif
          </div>
        </div>
      </div>

      <div class="card-footer">
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-decision-document"
          data-url={{ route('decisions.document', $decision->id) }}>
          <i class="fas fa-print"></i>
        </button>
        <button class="btn btn-warning btn-sm" id="js-contract-edit" data-toggle="modal"
          data-target="#modal-edit-decision" data-url={{ route('decisions.edit', $decision->id) }}>
          <i class="fas fa-pencil-alt"></i>
        </button>
        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirm-delete"
          data-url={{ route('decisions.destroy', $decision->id) }} }}>
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
