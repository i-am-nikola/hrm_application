<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules($update = false, $id = null)
  {
    $commun = [
      'name'  => 'required',
      'email' => 'required|email|unique:users,email,' . $id,
    ];

    if ($update) return $commun;
    return array_merge($commun, [
      'email' => 'required|email|unique:users'
    ]);
  }

  public function attributes()
  {
    return [
      'name'  => t('user.name'),
      'email' => t('user.email'),
    ];
  }

  public function messages()
  {
    return [
      '*.required'    => ':attribute ' . t('validate.required'),
      'email.email'   => ':attribute ' . t('validate.invalid'),
      'email.unique'  => ':attribute ' . t('validate.unique'),
    ];
  }
}
