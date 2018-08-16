<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TenantDatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->addRolesAndPermissions();
    }

    private function addRolesAndPermissions()
    {
        // create permissions for an admin
        $adminPermissions = collect(['create user', 'edit user', 'delete user'])->map(function ($name) {
            return Permission::create(['name' => $name]);
        });

        // add default roles
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($adminPermissions);

        $adminRole = Role::create(['name' => 'student']);
        $adminRole->givePermissionTo($adminPermissions);

        $adminRole = Role::create(['name' => 'staff']);
        $adminRole->givePermissionTo($adminPermissions);

        $adminRole = Role::create(['name' => 'hod']);
        $adminRole->givePermissionTo($adminPermissions);

        $adminRole = Role::create(['name' => 'guest']);
        $adminRole->givePermissionTo($adminPermissions);

        // add a default user role
        Role::create(['name' => 'user']);
    }
}
