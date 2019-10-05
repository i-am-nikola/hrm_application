<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
  public function index()
  {
    $roles = Role::all();
    return view('admin.roles.index', compact('roles'));
  }

  public function create()
  {
    return view('admin.roles.create');
  }

  public function store(RoleRequest $request)
  {
    if (Role::create($request->all())) {
      return redirect()->route('roles.index')
        ->with(['flash_level' => 'success', 'flash_message' => t('role.message.create')]);
    } else {
      return redirect()->back()
        ->with(['flash_level' => 'error', 'flash_message' => t('role.message.error')]);
    }
  }

  public function show($id)
  { }

  public function edit($id)
  {
    $role = Role::findOrFail($id);
    return view('admin.roles.edit', compact('role'));
  }

  public function update(Request $request, $id)
  {
    // dd($request->all());
    $roleRequest = new RoleRequest;
    $this->validate(
      $request,
      $roleRequest->rules(true, $id),
      $roleRequest->messages(),
      $roleRequest->attributes()
    );

    $role = Role::findOrFail($id);
    if ($role->update($request->all())) {
      return redirect()->route('roles.index')
        ->with(['flash_level' => 'success', 'flash_message' => t('role.message.update')]);
    } else {
      return redirect()->back()
        ->with(['flash_level' => 'error', 'flash_message' => t('role.message.error')]);
    }
  }

  public function destroy(Request $request, $id)
  {
    $role = Role::findOrFail($id);
    if ($request->ajax()) {
      if ($role->delete()) {
        return response(['id' => $id, 'flash_message' => t('role.message.delete')]);
      } else {
        return response(['flash_message' => t('role.message.no_delete')]);
      }
    }
  }
}
