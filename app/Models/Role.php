<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = 'roles';
  protected $fillable = ['id', 'name', 'slug'];

  public function users()
  {
    return $this->hasMany(User::class);
  }

  public function permissons()
  {
    return $this->belongsToMany(Permission::class, 'role_permission');
  }
}
