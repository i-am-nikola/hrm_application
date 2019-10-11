<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $table    = 'users';
  protected $fillable = ['name', 'email', 'role_id', 'password', 'status', 'remember_token'];

  public function role()
  {
    return $this->belongsTo(Role::class);
  }

  public function workers()
  {
    return $this->hasMany(Worker::class);
  }

  public function getInputUser($request, $password)
  {
    $input = [
      'name'            => $request->name,
      'email'           => $request->email,
      'role_id'         => $request->role_id,
      'password'        => bcrypt($password),
      'status'          => $request->status,
      'remember_token'  => $request->_token
    ];
    return $input;
  }
}
