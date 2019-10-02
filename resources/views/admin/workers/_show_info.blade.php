@php
$code = $name = $phone = $email = $position = $department = $staringDate = $leavingDate = '';
$status = 1;
@endphp
@if(isset($worker))
@php
$code = $worker->code;
$name = $worker->name;
$phone = $worker->phone;
$email = $worker->email;
$position = $worker->position;
$department = $worker->department->name;
$staringDate = $worker->staring_date !== null ? $worker->staring_date->format('d/m/Y') : '';
$leavingDate = $worker->leaving_date !== null ? $worker->leaving_date->format('d/m/Y') : '';
$status = $worker->status;
if ($status === 0) {
$status = t('worker.probationary');
} elseif ($status === 1) {
$status = t('worker.official');
} else {
$status = t('worker.off');
}
@endphp
@endif

<div class="card card-primary">
  <div class="card-header border-bottom-0">
    {{ t('worker.personnel') }}
  </div>
  <div class="card-body pt-3">
    <div class="row">
      <div class="col-12">
        <p class="text-muted mb-3">{{ $code }}</p>
        <h2 class="lead"><b>{{ $name }}</b></h2>
        <p class="text-muted text-md">{{ $department . ' - ' . $position }}</p>
        <ul class="ml-4 mb-0 fa-ul text-muted worker-info">
          <li>
            <span class="fa-li"><i class="fas fa-lg fa-envelope"></i></i></span>
            {{ t('worker.email') . ': ' . $email }}
          </li>
          <li>
            <span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
            {{ t('worker.phone') . ': ' . $phone }}
          </li>
          <li>
            <span class="fa-li"><i class="fas fa-lg fa-play"></i></span>
            {{ t('worker.status') . ': ' . $status }}
          </li>
          <li>
            <span class="fa-li"><i class="fas fa-lg fa-calendar-alt"></i></span>
            {{ t('worker.staring_date') . ': ' . $staringDate }}
          </li>
          @if ($leavingDate !== '')
          <li>
            <span class="fa-li"><i class="fas fa-lg fa-calendar-alt"></i></span>
            {{ t('worker.leaving_date') . ': ' . $leavingDate }}
          </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</div>
