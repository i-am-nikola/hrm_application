<div class="card-body">
  <div class="form-group">
    {!! Form::label('name', t('user.name'), ['class' => 'required']) !!}
    {!! Form::text('name', isset($user) ? $user->name : old('name'), ['class' => "form-control"]) !!}
    @include('admin.shared._validate_message', ['fillable' => 'name'])
  </div>
  <div class="form-group">
    {!! Form::label('email', t('user.email'), ['class' => 'required']) !!}
    {!! Form::text('email', isset($user) ? $user->email : old('email'), ['class' => "form-control", isset($readonly) ? $readonly : '']) !!}
    @include('admin.shared._validate_message', ['fillable' => 'email'])
  </div>
  <div class="form-group">
    {!! Form::label('role_id', t('user.role')) !!}
    {!! Form::select('role_id', $roles, isset($role) ? $role->id : 1, ['class' => "form-control"]) !!}
  </div>
  <div class="form-group">
    {!! Form::label('status', t('status.active')) !!}
    {!! Form::select('status', config('enum.boolean'), isset($user) ? $user->status : 1, ['class' => 'form-control'])
    !!}
  </div>
</div>
<div class="card-footer">
  {!! Form::submit(t('action.save'), ['class' => 'btn btn-primary']) !!}
  <a href={{ route('users.index') }} class="btn btn-secondary">{{ t('action.back') }}</a>
</div>
