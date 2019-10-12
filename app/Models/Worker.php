<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
  protected $table    = 'workers';
  protected $dates    = ['birthday', 'issued_on', 'staring_date', 'leaving_date'];
  protected $fillable = [
    'user_id', 'department_id', 'position', 'education_id', 'record_ids',
    'code', 'name', 'birthday', 'gender', 'id_no', 'issued_on', 'issued_by',
    'email', 'phone', 'permanent_address', 'temporary_address', 'graduate_school',
    'certificate', 'skill', 'staring_date', 'leaving_date', 'status'
  ];

  public function department()
  {
    return $this->belongsTo(Department::class);
  }

  public function decisions()
  {
    return $this->hasMany(Decision::class);
  }

  public function education()
  {
    return $this->belongsTo(Education::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function contracts()
  {
    return $this->hasMany(Contract::class);
  }

  public function getInputWorker($request)
  {
    // format date before insert
    $birthday    = formatDateToYmd($request->birthday);
    $issuedOn    = formatDateToYmd($request->issued_on);
    $staringDate = formatDateToYmd($request->staring_date);

    // convert record_ids from array to string before insert
    $recordIds = ($request->record_ids !== null) ? implode(',', $request->record_ids) : '';

    $input = [
      'user_id'           => $request->user_id,
      'code'              => $request->code,
      'name'              => $request->name,
      'id_no'             => $request->id_no,
      'issued_on'         => $issuedOn,
      'issued_by'         => $request->issued_by,
      'permanent_address' => $request->permanent_address,
      'temporary_address' => $request->temporary_address,
      'gender'            => $request->gender,
      'birthday'          => $birthday,
      'phone'             => $request->phone,
      'email'             => $request->email,
      'staring_date'      => $staringDate,
      'status'            => $request->status,
      'education_id'      => $request->education_id,
      'graduate_school'   => $request->graduate_school,
      'certificate'       => $request->certificate,
      'skill'             => $request->skill,
      'department_id'     => $request->department_id,
      'position'          => $request->position,
      'record_ids'        => $recordIds
    ];
    return $input;
  }
}
