<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Auth;
use App\Models\User;
use App\Models\Role;

use Closure;

class CheckPermissions
{
  public function handle($request, Closure $next, $permission = null)
  {
    // get role of user login
    $userLogin = User::findOrFail(Auth::user()->id);
    $roleOfUserLogin = $userLogin->role;

    // get permissions of role
    $permissionsOfRole = $roleOfUserLogin->permissions->pluck('id')->unique();

    $checkPermission = Permission::where('slug', $permission)->value('id');

    if ($permissionsOfRole->contains($checkPermission)) {
      return $next($request);
    } else {
      if ($request->ajax()) {
        return response()->json(['status' => 'fails', 'flash_message' => t('permission.message.no_permission')]);
      } else {
        return redirect()->back()->with(['flash_level' => 'warning', 'flash_message' => t('permission.message.no_permission')]);
      }
    }
    return abort(401);
  }
}
