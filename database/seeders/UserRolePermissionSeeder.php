<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Create role or get existing
        $roleuser = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        // Permission groups and permissions
        $permissions = [
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ],
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    'profile.view',
                    'profile.edit',
                ],
            ],
        ];

        // Loop and create permissions if not exist, then assign
        foreach ($permissions as $permissionGroup) {
            foreach ($permissionGroup['permissions'] as $permissionName) {
                $permission = Permission::firstOrCreate([
                    'name' => $permissionName,
                    'group_name' => $permissionGroup['group_name'],
                    'guard_name' => 'web',
                ]);
                $roleuser->givePermissionTo($permission);
            }
        }
    }
}
