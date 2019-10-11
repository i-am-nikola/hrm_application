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
    $breadcrumb = [
      'title' => t('breadcrumb.role'),
      'home'  => t('breadcrumb.home'),
      'list'  => t('breadcrumb.list')
    ];
    $roles = Role::all();
    return view('admin.roles.index', compact('roles', 'breadcrumb'));
  }

  public function create()
  {
    $breadcrumb = [
      'title' => t('breadcrumb.role'),
      'home'  => t('breadcrumb.home'),
      'list'  => t('breadcrumb.list'),
      'add'   => t('breadcrumb.add'),
      'route' => route('roles.index')
    ];
    return view('admin.roles.create', compact('breadcrumb'));
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

  public function edit($id)
  {
    $breadcrumb = [
      'title' => t('breadcrumb.role'),
      'home'  => t('breadcrumb.home'),
      'list'  => t('breadcrumb.list'),
      'edit'  => t('breadcrumb.edit'),
      'route' => route('roles.index')
    ];
    $role = Role::findOrFail($id);
    return view('admin.roles.edit', compact('role', 'breadcrumb'));
  }

  public function update(Request $request, $id)
  {
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
