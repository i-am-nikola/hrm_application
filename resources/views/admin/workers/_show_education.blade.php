@if (isset($worker))
@php
$education = $worker->education->name;
$graduateSchool = $worker->graduate_school;
$certificate = $worker->certificate;
$skill = $worker->skill;
@endphp
@endif
<div class="card-body pt-0">
  <div class="row">
    <div class="col-12">
      <ul class="ml-4 mb-0 fa-ul text-muted worker-info">
        <li>
          <span class="fa-li"><i class="fas fa-lg fa-graduation-cap"></i></span>
          {{ t('worker.education') . ': ' . $education }}
        </li>
        <li>
          <span class="fa-li"><i class="fas fa-lg fa-university"></i></span>
          {{ t('worker.graduate_school') . ': ' . $graduateSchool }}
        </li>
        <li>
          <span class="fa-li"><i class="fas fa-lg fa-certificate"></i></span>
          {{ t('worker.certificate') . ': ' . $certificate }}
        </li>
        <li>
          <span class="fa-li"><i class="fas fa-lg fa-atom"></i></span>
          {{ t('worker.skill') . ': ' . $skill }}
        </li>
      </ul>
    </div>
  </div>
</div>
