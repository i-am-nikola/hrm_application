<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  public function run()
  {
    $userManagement = config('system.roles_structure');
    $mapPermission = config('system.permission_map');

    $role_id = 1;
    foreach ($userManagement as $key => $modules) {
      // roles seeder
      $roles = Role::create([
        'name' => ucwords($key),
        'slug' => $key
      ]);

      // users seeder
      User::create([
        'role_id'   => $role_id,
        'name'      => ucwords($key),
        'email'     => $key . '@gmail.com',
        'password'  => bcrypt('123123')
      ]);

      // permissions-seeder
      $permissions = [];
      foreach ($modules as $module => $value) {
        $chars = explode(',', $value);
        foreach ($chars as $char) {
          $permissionValue = $mapPermission[$char];
          $permissions[] = Permission::firstOrCreate([
            'name' => t("seeder.$permissionValue") . ' ' . t("seeder.$module"),
            'slug' => $permissionValue . '-' . $module
          ])->id;
        }
      }
      // role-permission seeder
      $roles->permissons()->attach($permissions);
      $role_id++;
    }
  }
}
