<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
  public function index()
  {
    $departments = Department::all();
    return view('admin.departments.index', compact('departments'));
  }

  public function create()
  {
    return view('admin.departments.create');
  }

  public function store(DepartmentRequest $request)
  {
    if (Department::create($request->all())) {
      return redirect()->route('departments.index')
        ->with(['flash_level' => 'success', 'flash_message' => t('department.message.create')]);
    } else {
      return redirect()->back()
        ->with(['flash_level' => 'error', 'flash_message' => t('department.message.error')]);
    }
  }

  public function edit($id)
  {
    $department = Department::findOrFail($id);
    return view('admin.departments.edit', compact('department'));
  }

  public function update(Request $request, $id)
  {
    $departmentRequest = new DepartmentRequest();
    $this->validate(
      $request,
      $departmentRequest->rules(true, $id),
      $departmentRequest->messages(),
      $departmentRequest->attributes()
    );

    $department = Department::findOrFail($id);
    if ($department->update($request->all())) {
      return redirect()->route('departments.index')
        ->with(['flash_level' => 'success', 'flash_message' => t('department.message.update')]);
    } else {
      return redirect()->back()
        ->with(['flash_level' => 'error', 'flash_message' => t('department.message.error')]);
    }
  }

  public function destroy(Request $request, $id)
  {
    $department = Department::findOrFail($id);
    if ($request->ajax()) {
      if ($department->delete()) {
        return response(['id' => $id, 'flash_message' => t('department.message.delete')]);
      } else {
        return response(['flash_message' => t('department.message.no_delete')]);
      }
    }
  }
}
