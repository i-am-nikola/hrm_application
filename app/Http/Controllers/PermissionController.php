<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
  public function index()
  {
    $permissions = Permission::all();
    $roles = Role::all();
    return view('admin.permissions.index', compact('permissions', 'roles'));
  }

  public function saveRolePermission(Request $request, $id)
  {
    $role = Role::findOrFail($request->role_id);
    $permission = Permission::findOrFail($id);
    if ($request->ajax()) {
      if (json_decode($request->checked) === true) {
        $role->permissions()->attach($permission);
        return response()
          ->json(['flash_message' => t('permission.message.create', ['permission' => $permission->name, 'role' => $role->name])]);
      } else {
        $role->permissions()->detach($permission);
        return response()
          ->json(['flash_message' => t('permission.message.delete', ['permission' => $permission->name, 'role' => $role->name])]);
      }
    }
  }
}
