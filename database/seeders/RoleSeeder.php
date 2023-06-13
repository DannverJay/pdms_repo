<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRole = Role::create(['name' => 'user']);
        $adminRole = Role::create(['name' => 'admin']);

            Permission::create(['name' => 'create', 'guard_name' => 'web']);
            Permission::create(['name' => 'read', 'guard_name' => 'web']);
            Permission::create(['name' => 'update', 'guard_name' => 'web']);
            Permission::create(['name' => 'delete', 'guard_name' => 'web']);
          // Retrieve Permissions
          $permissions = Permission::all();

          // Assign Permissions to Roles
          $adminRole->syncPermissions($permissions);

          // Assign specific permissions to the $userRole
          $userRole->syncPermissions(['read', 'update', 'delete']);
    }
}
