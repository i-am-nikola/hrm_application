<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules($update = false, $id = null)
    {
      $commun = [
        'name' => 'required|unique:departments,name,' . $id
      ];

      if ($update) return $commun;

      return [
        'name' => 'required|unique:departments'
      ];
    }

    public function messages()
    {
      return [
        'name.required' => t('department.name') . ' ' . t('validate.required'),
        'name.unique'   => t('department.name') . ' ' . t('validate.unique'),
      ];
    }
}
