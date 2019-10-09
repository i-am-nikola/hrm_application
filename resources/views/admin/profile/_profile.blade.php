{!! Form::open(['route' => ['profile.updateProfile', $user->id], 'method' => 'PUT', 'id' => 'update-profile']) !!}
<div class="form-group row">
  {!! Form::label('name', t('user.name'), ['class' => 'col-sm-3 required']) !!}
  <div class="col-sm-9">
    {!! Form::text('name', $name, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('email', t('user.email'), ['class' => 'col-sm-3 required']) !!}
  <div class="col-sm-9">
    {!! Form::text('email', $email, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="form-group">
  <div class="col-sm-offset-3 col-sm-9">
    {!! Form::submit(t('action.save'), ['class' => 'btn btn-primary']) !!}
  </div>
</div>
{!! Form::close() !!}
