<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules($update = false, $id = null)
  {
    $commun = [
      'name' => 'required|unique:roles,name,' . $id
    ];

    if ($update) return $commun;

    return [
      'name' => 'required|unique:roles'
    ];
  }

  public function messages()
  {
    return [
      'name.required' => t('role.name') . ' ' . t('validate.required'),
      'name.unique'   => t('role.name') . ' ' . t('validate.unique'),
    ];
  }
}
