<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creacion de Roles
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleBasic = Role::create(['name' => 'Rol_basico']);

        //creacion de permisos y se le asocian los roles con el metodo syncRoles([])
        Permission::create(['name' => 'home'])->syncRoles([$roleAdmin, $roleBasic]);

        //Asignar permisos a un Rol
        $roleAdmin->permissions();
    }
}
