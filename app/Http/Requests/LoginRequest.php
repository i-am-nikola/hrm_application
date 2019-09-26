<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'email' => 'required|email',
      'password' => 'required'
    ];
  }

  public function attributes()
  {
    return [
      'email' => t('login.email'),
      'password' => t('login.password')
    ];
  }

  public function messages()
  {
    return [
      '*.required' => ':attribute ' . t('validate.required'),
      'email.email' => ':attribute ' . t('validate.invalid'),
    ];
  }
}
