<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
{
  protected $table = 'contract_types';
  protected $fillable = ['name', 'slug'];

  public function contracts()
  {
    return $this->hasMany(Contract::class);
  }
}
