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
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleBasic = Role::create(['name' => 'Rol Basico']);

        //SE CREO UN SOLO PERMISO PARA TODA LA CUESTION DE CONFIGURACION Y MANTENIMIENTOS
        Permission::create(['name' => 'menu-mainten'])->syncRoles([$roleAdmin]);

        //Asignar permisos a un Rol
        $roleAdmin->permissions();
    }
}
