@if ($users->isNotEmpty())
@foreach ($users as $key => $user)
@php
$status = $user->status ? t('status.active') : t('status.inactive');
$class = $user->status ? 'success' : 'secondary';
@endphp
<tr>
  <td class="text-center">{{ $key + 1 }}</td>
  <td>{{ $user->name }}</td>
  <td>{{ $user->email }}</td>
  <td>{{ $user->role->name }}</td>
  <th class="text-center">
    <span class="badge badge-{{ $class }}">{{ $status }}</span>
  </th>
  <td class="text-center">
    <a class="btn btn-info btn-sm" href={{ route('users.edit', $user->id) }}><i class="fas fa-pencil-alt"></i></a>
    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirm-delete" data-id={{ $user->id }} data-url={{ route('users.destroy', $user->id) }}>
      <i class="fas fa-trash"></i>
    </button>
  </td>
</tr>
@endforeach
@endif
