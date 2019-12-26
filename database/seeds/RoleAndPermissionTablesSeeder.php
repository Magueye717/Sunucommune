<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionTablesSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create roles
        Role::create(['name' => 'admin', 'description' => 'Administrateur']);

        // create permissions
        Permission::create(['name' => 'ajouter_infrastructure', 'description' => 'Ajouter une infrastructure']);
    }
}