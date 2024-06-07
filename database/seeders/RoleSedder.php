<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Reader']);
        $role3 = Role::create(['name' => 'Editor']);
        //crea tres permisos
        $permission1 = Permission::create(['name' => 'create']);
        $permission2 = Permission::create(['name' => 'read']);
        $permission3 = Permission::create(['name' => 'update']);
        $permission4 = Permission::create(['name' => 'delete']);
        //asigna permisos a roles
        $role1->givePermissionTo($permission1);
        $role1->givePermissionTo($permission2);
        $role1->givePermissionTo($permission3);
        $role1->givePermissionTo($permission4);
        $role2->givePermissionTo($permission2);
        $role3->givePermissionTo($permission3);
        $role3->givePermissionTo($permission4);
    }
}
