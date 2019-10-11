@if ($departments->isNotEmpty())
@foreach ($departments as $key => $department)
<tr>
  <td class="text-center">{{ $key + 1 }}</td>
  <td>{{ $department->name }}</td>
  <td class="text-center">{{ countWorkersByDepartment($department->id) }}</td>
  <td class="text-center">
    <a class="btn btn-info btn-sm" href={{ route('departments.edit', $department->id) }}>
      <i class="fas fa-pencil-alt"></i>
    </a>
    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirm-delete"
      data-id={{ $department->id }} data-url={{ route('departments.destroy', $department->id) }}>
      <i class="fas fa-trash"></i>
    </button>
  </td>
</tr>
@endforeach
@endif
