<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  public function rules($update = false, $id = null)
  {
    $commun = [
      'code'          => 'unique:workers,code,' . $id,
      'name'          => 'required',
      'id_no'         => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:20|unique:workers,id_no,' . $id,
      'phone'         => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:12',
      'email'         => 'nullable|email|unique:workers,email,' . $id,
      'education_id'  => 'required|not_in:0',
      'department_id' => 'required|not_in:0',
      'issued_on'     => 'nullable|date_format:"d/m/Y"',
      'birthday'      => 'nullable|date_format:"d/m/Y"',
      'staring_date'  => 'nullable|date_format:"d/m/Y"',
    ];

    if ($update) return $commun;

    return array_merge($commun, [
      'code'        => 'nullable|unique:workers',
      'id_no'       => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|unique:workers|min:9|max:20',
      'email'       => 'nullable|email|unique:workers',
    ]);
  }

  public function attributes()
  {
    return [
      'code'          => t('worker.code'),
      'name'          => t('worker.name'),
      'id_no'         => t('worker.id_no'),
      'phone'         => t('worker.phone'),
      'email'         => t('worker.email'),
      'education_id'  => t('worker.education'),
      'department_id' => t('worker.department'),
      'issued_on'     => t('worker.issued_on'),
      'birthday'      => t('worker.birthday'),
      'staring_date'  => t('worker.staring_date'),
    ];
  }

  public function messages()
  {
    return [
      '*.required'               => ':attribute ' . t('validate.required'),
      'code.unique'              => ':attribute ' . t('validate.unique'),
      'id_no.unique'             => ':attribute ' . t('validate.unique'),
      'id_no.regex'              => ':attribute ' . t('validate.invalid'),
      'id_no.min'                => ':attribute ' . t('validate.invalid'),
      'id_no.max'                => ':attribute ' . t('validate.invalid'),
      'phone.regex'              => ':attribute ' . t('validate.invalid'),
      'phone.min'                => ':attribute ' . t('validate.invalid'),
      'phone.max'                => ':attribute ' . t('validate.invalid'),
      'email.email'              => ':attribute ' . t('validate.invalid'),
      'email.unique'             => ':attribute ' . t('validate.unique'),
      'email.unique'             => ':attribute ' . t('validate.unique'),
      'education_id.not_in'      => ':attribute ' . t('validate.required'),
      'department_id.not_in'     => ':attribute ' . t('validate.required'),
      'issued_on.date_format'    => ':attribute ' . t('validate.invalid'),
      'birthday.date_format'     => ':attribute ' . t('validate.invalid'),
      'staring_date.date_format' => ':attribute ' . t('validate.invalid'),
    ];
  }
}
