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
      'code'    => 'required|unique:contracts,code,' . $id,
      'contract_type_id' => 'required|not_in:0',
      'salary'  => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
    ];

    if ($update) return $commun;

    return array_merge($commun, [
      'code'    => 'required|unique:contracts',
    ]);
  }

  public function attributes()
  {
    return [
      'code'    => t('contract.code'),
      'salary'  => t('contract.salary'),
      'contract_type_id' => t('contract.type'),
    ];
  }

  public function messages()
  {
    return [
      'code.required' => ':attribute ' . t('validate.required'),
      'code.unique'   => ':attribute ' . t('validate.unique'),
      'salary.regex'  => ':attribute ' . t('validate.invalid'),
      'contract_type_id.not_in' => ':attribute ' . t('validate.required')
    ];
  }
}
