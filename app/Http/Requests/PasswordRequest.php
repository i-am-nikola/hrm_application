<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'current_password' => 'required',
      'new_password' => 'required|different:current_password',
      'confirm_password' => 'required|same:new_password'
    ];
  }

  public function attributes()
  {
    return [
      'current_password' => t('profile.current_password'),
      'new_password' => t('profile.new_password'),
      'confirm_password' => t('profile.confirm_password')
    ];
  }

  public function messages()
  {
    return [
      '*.required' => ':attribute ' . t('validate.required'),
      'new_password.different' => ':attribute ' . t('validate.different'),
      'confirm_password.same' => ':attribute ' . t('validate.confirm')
    ];
  }
}
