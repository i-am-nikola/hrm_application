<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
  protected $table    = 'contracts';
  protected $dates    = [
    'effective_date',
    'expiry_date',
    'sign_date'
  ];
  protected $fillable = [
    'contract_type_id',
    'worker_id',
    'user_id',
    'code',
    'salary',
    'effective_date',
    'expiry_date',
    'sign_date',
    'status'
  ];

  public function worker()
  {
    return $this->belongsTo(Worker::class);
  }

  public function contractType()
  {
    return $this->belongsTo(ContractType::class);
  }

  public function getInputContract($request)
  {
    // format date before insert
    $effectiveDate = formatDateToYmd($request->effective_date);
    $expiryDate    = formatDateToYmd($request->expiry_date);
    $signDate      = formatDateToYmd($request->sign_date);

    $input = [
      'user_id'           => $request->user_id,
      'worker_id'         => $request->worker_id,
      'code'              => $request->code,
      'contract_type_id'  => $request->contract_type_id,
      'salary'            => $request->salary,
      'status'            => $request->status,
      'effective_date'    => $effectiveDate,
      'expiry_date'       => $expiryDate,
      'sign_date'         => $signDate
    ];
    return $input;
  }
}
