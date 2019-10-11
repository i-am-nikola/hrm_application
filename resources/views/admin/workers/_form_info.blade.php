@php
$code = $name = $idNo = $phone = $email = $issuedBy = $birthday= $issuedOn
= $permanentAddress = $temporaryAddress = '';
$status = $checked = 0;
$staringDate = date('d/m/Y');
@endphp

@if (isset($worker))
@php
$status = $worker->status;
$code = $worker->code;
$name = $worker->name;
$idNo = $worker->id_no;
$phone = $worker->phone;
$email = $worker->email;
$checked = $worker->gender === 0 ? true : false;
$issuedBy = $worker->issued_by;
$birthday = $worker->birthday !== null ? $worker->birthday->format('d/m/Y') : '';
$issuedOn = $worker->issued_on !== null ? $worker->issued_on->format('d/m/Y') : '';
$staringDate = $worker->staring_date !== null ? $worker->staring_date->format('d/m/Y') : date('d/m/Y');
$permanentAddress = $worker->permanent_address;
$temporaryAddress = $worker->temporary_address;
@endphp
@endif

<div class="active tab-pane" id="info">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            {!! Form::label('code', t('worker.code')) !!}
            {!! Form::text('code', $code, ['class' => 'form-control']) !!}
            @include('admin.shared._validate_message', ['fillable' => 'code'])
          </div>
          <div class="form-group">
            {!! Form::label('name', t('worker.name'), ['class' => 'required']) !!}
            {!! Form::text('name', $name, ['class' => 'form-control']) !!}
            @include('admin.shared._validate_message', ['fillable' => 'name'])
          </div>
          <div class="form-group">
            {!! Form::label('id_no', t('worker.id_no'), ['class' => 'required']) !!}
            {!! Form::text('id_no', $idNo, ['class' => 'form-control']) !!}
            @include('admin.shared._validate_message', ['fillable' => 'id_no'])
          </div>
          <div class="form-group">
            {!! Form::label('issued_on', t('worker.issued_on')) !!}
            {!! Form::text('issued_on', $issuedOn, ['class' => 'form-control reservation js-clear']) !!}
            @include('admin.shared._validate_message', ['fillable' => 'issued_on'])
          </div>
          <div class="form-group">
            {!! Form::label('issued_by', t('worker.issued_by')) !!}
            {!! Form::text('issued_by', $issuedBy, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('permanent_address', t('worker.permanent_address')) !!}
            {!! Form::text('permanent_address', $permanentAddress, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('temporary_address', t('worker.temporary_address')) !!}
            {!! Form::text('temporary_address', $temporaryAddress, ['class' => 'form-control']) !!}
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group row">
            <div class="col-sm-12">
                {!! Form::label('gender', t('worker.gender')) !!}
            </div>
            <div class="custom-control custom-radio col-sm-4 pl-5 mb-2 pt-1">
              {!! Form::radio('gender', 1, true, ['class' => 'custom-control-input', 'id' => 'male']) !!}
              {!! Form::label('male', t('gender.male'), ['class' => 'custom-control-label']) !!}
            </div>
            <div class="custom-control custom-radio col-sm-4 pl-5 mb-2 pt-1">
              {!! Form::radio('gender', 0, $checked, ['class' => 'custom-control-input', 'id' => 'female']) !!}
              {!! Form::label('female', t('gender.female'), ['class' => 'custom-control-label']) !!}
            </div>
          </div>
          <div class="form-group">
            {!! Form::label('birthday', t('worker.birthday')) !!}
            {!! Form::text('birthday', $birthday, ['class' => 'form-control reservation js-clear']) !!}
            @include('admin.shared._validate_message', ['fillable' => 'birthday'])
          </div>
          <div class="form-group">
            {!! Form::label('phone', t('worker.phone')) !!}
            {!! Form::text('phone', $phone, ['class' => 'form-control']) !!}
            @include('admin.shared._validate_message', ['fillable' => 'phone'])
          </div>
          <div class="form-group">
            {!! Form::label('email', t('worker.email')) !!}
            {!! Form::text('email', $email, ['class' => 'form-control']) !!}
            @include('admin.shared._validate_message', ['fillable' => 'email'])
          </div>
          <div class="form-group">
            {!! Form::label('staring_date', t('worker.staring_date')) !!}
            {!! Form::text('staring_date', $staringDate, ['class' => 'form-control reservation']) !!}
            @include('admin.shared._validate_message', ['fillable' => 'staring_date'])
          </div>
          <div class="form-group">
            {!! Form::label('status', t('worker.status')) !!}
            {!! Form::select('status', config('enum.worker_status'), $status, ['class' => 'form-control']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
