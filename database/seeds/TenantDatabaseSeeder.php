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
        $dashboard = Permission::create(['name' => 'dashboard', 'title' => 'dashboard', 'group' => 'apps', 'icon' => 'dashboard', 'target' => '']);

        $adminPermissions = collect(['users', 'metadata', 'permissions', 'roles'])->map(function ($name) {
            return Permission::create(['title' => $name, 'group' => 'administration', 'name' => $name, 'component' => 'administration', 'icon' => 'tune', 'target' => '']); // , 'guard_name' = 'api'
        });

        // add default roles
        $adminRole = Role::create(['name' => 'admin']);
        // $adminRole->givePermissionTo($dashboard);
        // $adminRole->givePermissionTo($adminPermissions);

        // Role::create(['name' => 'student']);
        // Role::create(['name' => 'staff']);
        // Role::create(['name' => 'hod']);
    }
}
