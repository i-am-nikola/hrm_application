<div class="modal-body">
  <div class="row">
    <div class="col-md-12">
      <div class="tab-content">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              {!! Form::label('code', t('decision.code'), ['class' => 'required']) !!}
              {!! Form::text('code', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('decision_type', t('decision.type'), ['class' => 'required']) !!}
              {!! Form::select('decision_type_id', getListDecisionTypes(), 0, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('effective_date', t('decision.effective_date')) !!}
              {!! Form::text('effective_date', '', ['class' => 'form-control reservation']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('sign_date', t('decision.sign_date')) !!}
              {!! Form::text('sign_date', date('d/m/Y'), ['class' => 'form-control reservation']) !!}
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group change-form">
              {!! Form::label('leaving_date', t('decision.leaving_date')) !!}
              {!! Form::text('leaving_date', '', ['class' => 'form-control reservation']) !!}
            </div>
            <div class="form-group change-form">
              {!! Form::label('reason', t('decision.reason')) !!}
              {!! Form::text('reason', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group change-form">
              {!! Form::label('formality', t('decision.formality')) !!}
              {!! Form::text('formality', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group change-form">
              {!! Form::label('old_salary', t('decision.old_salary')) !!}
              {!! Form::text('old_salary', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group change-form">
              {!! Form::label('new_salary', t('decision.new_salary')) !!}
              {!! Form::text('new_salary', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group change-form">
              {!! Form::label('old_department', t('decision.old_department')) !!}
              {!! Form::select('old_department', getListDepartments(t('department.default')), 0, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group change-form">
              {!! Form::label('new_department', t('decision.new_department')) !!}
              {!! Form::select('new_department', getListDepartments(t('department.default')), 0, ['class' =>
              'form-control']) !!}
            </div>
            <div class="form-group change-form">
              {!! Form::label('old_position', t('decision.old_position')) !!}
              {!! Form::text('old_position', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group change-form">
              {!! Form::label('new_position', t('decision.new_position')) !!}
              {!! Form::text('new_position', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('status', t('decision.status')) !!}
              {!! Form::select('status', config('enum.contract_status'), 1, ['class' => 'form-control']) !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal-footer justify-content-between">
  {!! Form::button(t('action.close'), ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
  {!! Form::submit(t('action.save'), ['class' => 'btn btn-primary']) !!}
</div>
