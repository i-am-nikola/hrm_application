@php
$idNo = $issuedBy = $permanentAddress = $temporaryAddress = $birthday = $issuedOn = '' ;
$gender = 1;
@endphp
@if(isset($worker))
@php
$idNo = $worker->id_no;
$gender = $worker->gender;
$issuedBy = $worker->issued_by;
$permanentAddress = $worker->permanent_address;
$temporaryAddress = $worker->temporary_address;
$birthday = $worker->birthday !== null ? $worker->birthday->format('d/m/Y') : '';
$issuedOn = $worker->issued_on !== null ? $worker->issued_on->format('d/m/Y') : '';
@endphp
@endif

<div class="card-body pt-0">
  <div class="row">
    <div class="col-12">
      <ul class="ml-4 mb-0 fa-ul text-muted worker-info">
        <li class="small">
          <span class="fa-li"><i class="fas fa-lg fa-transgender"></i></span>
          {{ t('worker.gender') . ': ' . ($gender ? t('gender.male') : t('gender.female')) }}
        </li>
        <li class="small">
          <span class="fa-li"><i class="fas fa-lg fa-birthday-cake"></i></span>
          {{ t('worker.birthday') . ': ' . $birthday}}
        </li>
        <li class="small">
          <span class="fa-li"><i class="fas fa-md fa-id-card"></i></span>
          {{ t('worker.id_no') . ': ' . $idNo }}
        </li>
        <li class="small">
          <span class="fa-li"><i class="fas fa-lg fa-calendar-alt"></i></span>
          {{ t('worker.issued_on') . ': ' . $issuedOn }}
        </li>
        <li class="small">
          <span class="fa-li"><i class="fas fa-lg fa-paper-plane"></i></span>
          {{ t('worker.issued_by') . ': ' . $issuedBy }}
        </li>
        <li class="small">
          <span class="fa-li"><i class="fas fa-lg fa-home"></i></span>
          {{ t('worker.permanent_address') . ': ' . $permanentAddress }}
        </li>
        <li class="small">
          <span class="fa-li"><i class="fas fa-lg fa-house-damage"></i></span>
          {{ t('worker.temporary_address') . ': ' . $temporaryAddress }}
        </li>
      </ul>
    </div>
  </div>
</div>
