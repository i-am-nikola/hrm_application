<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DecisionType extends Model
{
  public function decisions()
  {
    return $this->hasMany(Decision::class);
  }
}
