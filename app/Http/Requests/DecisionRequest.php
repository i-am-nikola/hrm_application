<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DecisionRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules($update = false, $id = null)
  {
    $commun = [
      'code'             => 'required|unique:decisions,code,' . $id,
      'decision_type_id' => 'required|not_in:0',
      'effective_date'   => 'nullable|date',
      'sign_date'        => 'nullable|date',
      'leaving_date'     => 'nullable|date',
      'old_salary'       => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
      'new_salary'       => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
    ];

    if ($update) return $commun;

    return array_merge($commun, [
      'code'             => 'required|unique:decisions',
    ]);
  }

  public function attributes()
  {
    return [
      'code'             => t('decision.code'),
      'decision_type_id' => t('decision.type'),
      'effective_date'   => t('decision.effective_date'),
      'sign_date'        => t('decision.sign_date'),
      'leaving_date'     => t('decision.leaving_date'),
      'old_salary'       => t('decision.old_salary'),
      'new_salary'       => t('decision.new_salary')
    ];
  }

  public function messages()
  {
    return [
      '*.required'              => ':attribute ' . t('validate.required'),
      'code.unique'             => ':attribute ' . t('validate.unique'),
      'decision_type_id.not_in' => ':attribute ' . t('validate.required'),
      'effective_date.date'     => ':attribute ' . t('validate.invalid'),
      'sign_date.date'          => ':attribute ' . t('validate.invalid'),
      'leaving_date.date'       => ':attribute ' . t('validate.invalid'),
      'old_salary.regex'        => ':attribute ' . t('validate.invalid'),
      'new_salary.regex'        => ':attribute ' . t('validate.invalid'),
    ];
  }
}
