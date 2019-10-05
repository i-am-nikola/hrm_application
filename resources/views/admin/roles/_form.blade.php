<div class="card-body">
  <div class="form-group">
    {!! Form::label('name', t('role.name'), ['class' => 'required']) !!}
    {!! Form::hidden('slug', isset($role) ? $role->slug : '', ['class' => "form-control"]) !!}
    {!! Form::text('name', isset($role) ? $role->name : '', ['class' => "form-control"]) !!}
    @include('admin.shared._validate_message', ['fillable' => 'name'])
  </div>
</div>
<div class="card-footer">
  {!! Form::submit(t('action.save'), ['class' => 'btn btn-primary']) !!}
  <a href={{ route('roles.index') }} class="btn btn-secondary">{{ t('action.back') }}</a>
</div>
