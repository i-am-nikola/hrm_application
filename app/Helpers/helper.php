<?php

use App\Models\Contract;
use App\Models\ContractType;
use App\Models\Decision;
use App\Models\DecisionType;
use Carbon\Carbon;
use App\Models\Department;
use App\Models\Education;
use App\Models\Role;
use App\Models\User;
use App\Models\Worker;

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

function countUsersByRole($roleId)
{
  $count = 0;
  if (isset($roleId) && $roleId > 0) {
    $count =  User::where('role_id', $roleId)->count();
  }
  return $count;
}

function countWorkers()
{
  return Worker::where('status', '<>', -1)->count();
}

function countOfficialWorkers()
{
  return Worker::where('status', 1)->count();
}

function countProbationaryWorkers()
{
  return Worker::where('status', 0)->count();
}

function countUsers()
{
  return User::count();
}

function countActiveUsers()
{
  return User::where('status', 1)->count();
}

function countInactiveUsers()
{
  return User::where('status', 0)->count();
}

function countContracts()
{
  return Contract::count();
}

function countSignedContracts()
{
  return Contract::where('status', 1)->count();
}

function countUnsignedContracts()
{
  return Contract::where('status', 0)->count();
}

function countDecisions()
{
  return Decision::count();
}

function countSignedDecisions()
{
  return Decision::where('status', 1)->count();
}

function countUnsignedDecisions()
{
  return Decision::where('status', 0)->count();
}

function months()
{
  $month[] = '-- ' . t('dashboard.month') . ' --';
  for ($i = 1; $i <= 12; $i++) {
    $month[$i] = t('dashboard.month') . ' ' . $i;
  }
  return $month;
}

function years()
{
  $year = [];
  for ($j = 2010; $j <= now()->year; $j++) {
    $year[$j] = $j;
  }
  return $year;
}

function getListRoles()
{
  $roles = [];
  $roles = Role::all()->pluck('name', 'id');
  return $roles;
}
