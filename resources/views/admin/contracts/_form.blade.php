<div class="modal-body">
  <div class="row">
    <div class="col-md-12">
      <div class="tab-content">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              {!! Form::label('code', t('contract.code')) !!}
              {!! Form::text('code', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('contract_type', t('contract.type')) !!}
              {!! Form::select('contract_type_id', $contractTypes, 0, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('salary', t('contract.salary')) !!}
              {!! Form::text('salary', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('status', t('contract.status')) !!}
              {!! Form::select('status', config('enum.contract_status'), 0, ['class' => 'form-control']) !!}
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              {!! Form::label('effective_date', t('contract.effective_date')) !!}
              {!! Form::text('effective_date', date('d/m/Y'), ['class' => 'form-control reservation']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('expiry_date', t('contract.expiry_date')) !!}
              {!! Form::text('expiry_date', '', ['class' => 'form-control reservation js-clear']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('sign_date', t('contract.sign_date')) !!}
              {!! Form::text('sign_date', date('d/m/Y'), ['class' => 'form-control reservation']) !!}
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
