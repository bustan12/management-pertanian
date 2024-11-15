<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Membuat role
        $adminRole = Role::create(['name' => 'admin']);
        $petaniRole = Role::create(['name' => 'petani']);

        // Membuat permission
        $manageUsers = Permission::create(['name' => 'manage users']);
        $manageCrops = Permission::create(['name' => 'manage crops']);

        // Memberikan permission ke role
        $adminRole->givePermissionTo($manageUsers);
        $petaniRole->givePermissionTo($manageCrops);
    }
}
