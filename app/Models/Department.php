<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  protected $table = 'departments';
  protected $fillable = ['parent_id', 'name', 'slug'];

  public function workers()
  {
    $this->hasMany(Worker::class);
  }

  public static function getListDepartment()
  {
    return self::orderBy('id', 'asc')
      ->pluck('name', 'id')->forget(1)
      ->prepend(t('department.default'), 1);
  }
}
