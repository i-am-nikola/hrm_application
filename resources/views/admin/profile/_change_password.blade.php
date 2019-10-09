
  {!! Form::open(['method' => 'PUT', 'route' => ['profile.updatePassword', $user->id], 'id' => 'update-password']) !!}
  <div class="form-group row">
    {!! Form::label('current_password', t('profile.current_password'), ['class' => 'col-sm-3 required']) !!}
    <div class="col-sm-9">
      {!! Form::password('current_password', ['class' => 'form-control']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('new_password', t('profile.new_password'), ['class' => 'col-sm-3 required']) !!}
    <div class="col-sm-9">
      {!! Form::password('new_password', ['class' => 'form-control']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('confirm_password', t('profile.confirm_password'), ['class' => 'col-sm-3 required']) !!}
    <div class="col-sm-9">
      {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      {!! Form::submit(t('action.save'), ['class' => 'btn btn-primary']) !!}
    </div>
  </div>
  {!! Form::close() !!}

