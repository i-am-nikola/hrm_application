<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
  protected $table    = 'decisions';
  protected $dates    = [
    'effective_date',
    'sign_date',
    'leaving_date'
  ];
  protected $fillable = [
    'decision_type_id',
    'worker_id',
    'user_id',
    'code',
    'reason',
    'formality',
    'old_department',
    'new_department',
    'old_position',
    'new_position',
    'old_salary',
    'new_salary',
    'effective_date',
    'sign_date',
    'leaving_date',
    'status'
  ];

  public function worker()
  {
    return $this->belongsTo(Worker::class);
  }

  public function decisionType()
  {
    return $this->belongsTo(DecisionType::class);
  }

  public function getInputDecision($request)
  {
    // format date before insert
    $effectiveDate = formatDateToYmd($request->effective_date);
    $leavingDate   = formatDateToYmd($request->leaving_date);
    $signDate      = formatDateToYmd($request->sign_date);

    $input = [
      'decision_type_id'  => $request->decision_type_id,
      'user_id'           => $request->user_id,
      'worker_id'         => $request->worker_id,
      'code'              => $request->code,
      'reason'            => $request->reason,
      'formality'         => $request->formality,
      'old_department'    => $request->old_department,
      'new_department'    => $request->new_department,
      'old_position'      => $request->old_position,
      'new_position'      => $request->new_position,
      'old_salary'        => $request->old_salary,
      'new_salary'        => $request->new_salary,
      'effective_date'    => $effectiveDate,
      'sign_date'         => $signDate,
      'leaving_date'      => $leavingDate,
      'status'            => $request->status,
    ];
    return $input;
  }
}
