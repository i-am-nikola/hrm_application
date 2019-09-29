<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
  protected $table = 'decisions';
  protected $fillable = [
    'decision_type_id', 'worker_id', 'user_id', 'code', 'reason',
    'old_department', 'new_department', 'old_position', 'new_position',
    '	old_salary', 'new_salary', 'effective_date', 'sign_date', 'status'
  ];

  public function worker()
  {
    return $this->belongsTo(Worker::class);
  }
}
