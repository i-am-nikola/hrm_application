@if ($permissions->isNotEmpty())
@foreach ($permissions as $permKey => $permission)
<tr>
  <td class="text-center">{{ $permKey + 1 }}</td>
  <td>{{ $permission->name }}</td>
  @if ($roles->isNotEmpty())
  @foreach ($roles as $roleKey => $role)
  <td class="text-center">
    <div class="custom-control custom-switch js-switch-role-permisison">
      {!! Form::checkbox(
      'role',
      $role->id,
      $role->permissions->contains('slug', $permission->slug),
      [
      'class' => 'custom-control-input',
      'id' => 'customSwitch' . $permKey . $roleKey,
      'data-url' => route('permissions.save', $permission->id)
      ]
      ) !!}
      <label class="custom-control-label" for="customSwitch{{ $permKey . $roleKey }}"></label>
    </div>
  </td>
  @endforeach
  @endif
</tr>
@endforeach
@endif
