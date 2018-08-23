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
        // create permissions for an admin alongside all default permissions.
        Permission::create(['parent_name' => 'dashboard','name' => 'dashboard']);
        $adminPermissions = collect(['users', 'metadata', 'profile', 'permissions', 'roles'])->map(function ($name) {
            return Permission::create(['parent_name' => 'administration','name' => $name]);
        });

        // add default roles
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($adminPermissions);

        Role::create(['name' => 'student']);
        Role::create(['name' => 'staff']);
        Role::create(['name' => 'hod']);

        // add a default guest role
        Role::create(['name' => 'guest']);
    }
}
