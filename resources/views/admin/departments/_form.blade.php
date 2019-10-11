<div class="card-body">
  <div class="form-group">
    {!! Form::label('name', t('department.name'), ['class' => 'required']) !!}
    {!! Form::hidden('slug', isset($department) ? $department->slug : '', ['class' => "form-control"]) !!}
    {!! Form::text('name', isset($department) ? $department->name : '', ['class' => "form-control"]) !!}
    @include('admin.shared._validate_message', ['fillable' => 'name'])
  </div>
</div>
<div class="card-footer">
  {!! Form::submit(t('action.save'), ['class' => 'btn btn-primary']) !!}
  <a href={{ route('departments.index') }} class="btn btn-secondary">{{ t('action.back') }}</a>
</div>
