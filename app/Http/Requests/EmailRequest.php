<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'email' => 'required|email'
    ];
  }

  public function messages()
  {
    return [
      'email.required' => t('user.email') . ' ' . t('validate.required'),
      'email.email'    => t('user.email') . ' ' . t('validate.invalid'),
    ];
  }
}
