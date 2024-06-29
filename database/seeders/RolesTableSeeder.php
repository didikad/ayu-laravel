<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'admin']);
        $superadminRole = Role::firstOrCreate(['name' => 'superadmin', 'guard_name' => 'admin']);

        $createPostPermission = Permission::firstOrCreate(['name' => 'create_post', 'guard_name' => 'admin']);
        $editPostPermission = Permission::firstOrCreate(['name' => 'edit_post', 'guard_name' => 'admin']);
        $deletePostPermission = Permission::firstOrCreate(['name' => 'delete_post', 'guard_name' => 'admin']);

        $adminRole->syncPermissions([$createPostPermission]);
        $superadminRole->syncPermissions([$createPostPermission, $editPostPermission, $deletePostPermission]);
    }
}
