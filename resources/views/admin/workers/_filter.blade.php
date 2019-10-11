{!! Form::open(['route' => 'workers.index', 'method' => 'GET']) !!}
<div class="row">
  <div class="form-group m-0 p-2">
    {{ t('worker.in') }}:
  </div>
  <div class="form-group m-0 col-2">
    {!! Form::text('staring_from', request('staring_from'), ['class' => 'form-control reservation',
    'placeholder' => t('worker.from')]) !!}
  </div>
  <div class="form-group m-0 col-2">
    {!! Form::text('staring_to', request('staring_to') , ['class' => 'form-control reservation', 'placeholder'
    => t('worker.to')]) !!}
  </div>
  <div class="form-group m-0 col-3">
    @php
    $departments = getListDepartments();
    $departments[''] = t('department.all');
    @endphp
    {!! Form::select('department_id', $departments , (request('department_id') !==0) ? request('department_id') : null,
    ['class' => 'form-control']) !!}
  </div>
  @php
  $status = config('enum.worker_status');
  $status[null] = t('worker.status_all');
  @endphp
  <div class="form-group m-0 col-2">
    {!! Form::select('status', $status, (request('status') !== 0) ? request('status') : null,
    ['class' => 'form-control']) !!}
  </div>
  <div class="form-group m-0 col-1">
    {!! Form::submit(t('action.filter'), ['class' => 'btn btn-info']) !!}
  </div>
</div>
{!! Form::close() !!}
