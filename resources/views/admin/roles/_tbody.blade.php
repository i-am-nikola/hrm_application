@if ($roles->isNotEmpty())
@foreach ($roles as $key => $role)
<tr>
  <td class="text-center">{{ $key + 1 }}</td>
  <td>{{ $role->name }}</td>
  <td class="text-center">{{ countUsersByRole($role->id) }}</td>
  <td class="text-center">
    <a class="btn btn-info btn-sm" href={{ route('roles.edit', $role->id) }}><i class="fas fa-pencil-alt"></i></a>
    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirm-delete" data-id={{ $role->id }} data-url={{ route('roles.destroy', $role->id) }}>
      <i class="fas fa-trash"></i>
    </button>
  </td>
</tr>
@endforeach
@endif
