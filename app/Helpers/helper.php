<?php

use App\Models\ContractType;
use App\Models\DecisionType;
use Carbon\Carbon;
use App\Models\Department;
use App\Models\Education;

function formatDateToYmd($dateValue)
{
  return $dateValue ? Carbon::createFromFormat('d/m/Y', $dateValue)->format('Y-m-d') : null;
}

function getDepartmentNameById($id)
{
  $name = '';
  if (isset($id) && $id > 0) {
    $name = Department::findOrFail($id)->name;
  }
  return $name;
}

function getListContractTypes()
{
  $contractTypes = ContractType::orderBy('id', 'asc')
    ->pluck('name', 'id')
    ->prepend(t('contract.default'), null);
  return !empty($contractTypes) ? $contractTypes : [];
}

function getListDecisionTypes()
{
  $decisionTypes = DecisionType::orderBy('id', 'asc')->pluck('name', 'id');
  return !empty($decisionTypes) ? $decisionTypes : [];
}

function getListDepartments()
{
  $departments = Department::orderBy('id', 'asc')
    ->pluck('name', 'id')
    ->prepend(t('department.default'), null);
  return $departments;

}

function getListEducations()
{
  $educations = Education::orderBy('id', 'asc')
    ->pluck('name', 'id')
    ->prepend(t('education.default'), null);
  return !empty($educations) ? $educations : [];
}
