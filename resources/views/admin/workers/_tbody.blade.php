@if ($workers->isNotEmpty())
@foreach ($workers as $key => $worker)
@php
if($worker->status === -1){
$status = t('worker.off');
$class = 'secondary';
}else {
$status = $worker->status ? t('worker.official') : t('worker.probationary');
$class = $worker->status ? 'success' : 'warning';
}
@endphp
<tr>
  <td class="text-center">{{ $key + 1 }}</td>
  <td>{{ $worker->code }}</td>
  <td>{{ $worker->name }}</td>
  <td>{{ $worker->phone }}</td>
  <td>{{ $worker->staring_date !== null ? $worker->staring_date->format('d/m/Y') : '' }}</td>
  <th class="text-center">
    <span class="badge badge-{{ $class }}">{{ $status }}</span>
  </th>
  <td class="text-center">
    <a class="btn btn-info btn-sm" href={{ route('workers.show', $worker->id) }}><i class="fas fa-eye"></i></a>
    <a class="btn btn-warning btn-sm" href={{ route('workers.edit', $worker->id) }}>
      <i class="fas fa-pencil-alt"></i>
    </a>
    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirm-delete"
      data-id={{ $worker->id }}  data-url={{ route('workers.destroy', $worker->id) }}>
      <i class="fas fa-trash"></i>
    </button>
  </td>
</tr>
@endforeach
@endif
