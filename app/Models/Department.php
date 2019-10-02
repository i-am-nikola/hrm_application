<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  protected $table = 'departments';
  protected $fillable = ['parent_id', 'name', 'slug'];

  public function workers()
  {
    return $this->hasMany(Worker::class);
  }

}
