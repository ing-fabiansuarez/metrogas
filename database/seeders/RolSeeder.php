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
        $roleDireccionFinanciera  = Role::create(['name' => 'Rol Direccion Financiera']);
        $roleTesoreria = Role::create(['name' => 'Tesoreria']);

        //SE CREO UN SOLO PERMISO PARA TODA LA CUESTION DE CONFIGURACION Y MANTENIMIENTOS
        Permission::create(['name' => 'menu-mainten', 'description' => 'Permite el acceso a la configuración de la aplicación'])->syncRoles([$roleAdmin]);

        //permisos para el proceso de viaticos
        Permission::create(['name' => 'aproveGeneral', 'description' => 'Aprobación o Anulación general de las solicitudes de Anticipos de viaticos.'])->syncRoles([$roleDireccionFinanciera]);
        Permission::create(['name' => 'aproveTesoreria', 'description' => 'Aprobación o Anulación de Tesoreria y Soportes de las solicitudes de Anticipos de viaticos.'])->syncRoles([$roleTesoreria]);
    }
}
