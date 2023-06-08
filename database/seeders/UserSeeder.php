<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // Create 20 regular users with numerical IDs starting from 1
    $regularUsers = User::factory()->times(20)->create(['id' => null])->each(function ($user, $index) {
        $user->id = $index + 1;
        $user->save();
    });

    // Create the admin user with user_id 0
    $adminUser = User::create([
        'id' => 0,
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'email_verified_at' => now(),
        'password' => Hash::make('password'), // password
    ]);

    // Assign the 'admin' role to the admin user
    $adminRole = Role::where('name', 'admin')->first();
    if ($adminRole) {
        $adminUser->assignRole($adminRole);
    }

    // Assign the 'user' role to the regular users
    $userRole = Role::where('name', 'user')->first();
    if ($userRole) {
        foreach ($regularUsers as $user) {
            $user->assignRole($userRole);
        }
    }
}

}
