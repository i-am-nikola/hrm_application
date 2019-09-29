<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
  protected $table = 'contracts';
  protected $fillable = [
    'contract_type_id', 'worker_id', 'user_id', 'code', 'salary',
    'effective_date', 'expiry_date', 'sign_date', 'status'
  ];

  public function worker()
  {
    return $this->belongsTo(Worker::class);
  }
}
