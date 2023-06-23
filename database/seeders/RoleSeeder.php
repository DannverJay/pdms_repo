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

            Permission::create(['name' => 'create']);
            Permission::create(['name' => 'read']);
            Permission::create(['name' => 'update']);
            Permission::create(['name' => 'delete']);
          // Retrieve Permissions
          $permissions = Permission::all();

          // Assign Permissions to Roles
          $adminRole->syncPermissions($permissions);

          // Assign specific permissions to the $userRole
          $userRole->syncPermissions(['read', 'update']);
    }
}
