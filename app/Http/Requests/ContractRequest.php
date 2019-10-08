<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules($update = false, $id = null)
  {
    $commun = [
      'code'             => 'required|unique:contracts,code,' . $id,
      'salary'           => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
      'contract_type_id' => 'required|not_in:0',
      'effective_date'   => 'nullable|date_format:"d/m/Y"',
      'expiry_date'      => 'nullable|date_format:"d/m/Y"',
      'sign_date'        => 'nullable|date_format:"d/m/Y"',
    ];

    if ($update) return $commun;

    return array_merge($commun, [
      'code'    => 'required|unique:contracts',
    ]);
  }

  public function attributes()
  {
    return [
      'code'             => t('contract.code'),
      'salary'           => t('contract.salary'),
      'contract_type_id' => t('contract.type'),
      'effective_date'   => t('contract.effective_date'),
      'expiry_date'      => t('contract.expiry_date'),
      'sign_date'        => t('contract.sign_date'),
    ];
  }

  public function messages()
  {
    return [
      'code.required'              => ':attribute ' . t('validate.required'),
      'code.unique'                => ':attribute ' . t('validate.unique'),
      'salary.regex'               => ':attribute ' . t('validate.invalid'),
      'contract_type_id.not_in'    => ':attribute ' . t('validate.required'),
      'effective_date.date_format' => ':attribute ' . t('validate.invalid'),
      'expiry_date.date_format'    => ':attribute ' . t('validate.invalid'),
      'sign_date.date_format'      => ':attribute ' . t('validate.invalid'),
    ];
  }
}
