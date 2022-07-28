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
        $roleDirectorFinanciero  = Role::create(['name' => 'Rol Director Financiero']);
        $roleJefeFinanciero  = Role::create(['name' => 'Rol Jefe Financiero']);
        $roleTesoreria = Role::create(['name' => 'Rol Tesoreria']);
        $roleContabilidad = Role::create(['name' => 'Rol Contabilidad']);
        $roleSecretaryGerencia = Role::create(['name' => 'Rol Secretaria de Gerencia']);

        //SE CREO UN SOLO PERMISO PARA TODA LA CUESTION DE CONFIGURACION Y MANTENIMIENTOS
        Permission::create(['name' => 'menu-mainten', 'description' => 'Permite el acceso a la configuración de la aplicación'])->syncRoles([$roleAdmin]);

        //permisos para el proceso de viaticos
        Permission::create(['name' => 'aproveGeneral', 'description' => 'Aprobación o Anulación general de las legalizaciones.'])->syncRoles([$roleDirectorFinanciero, $roleJefeFinanciero]);
        Permission::create(['name' => 'aproveGeneralJefe', 'description' => 'Aprobación o Anulación general de las Solicitudes menores a un salario minimo.'])->syncRoles([$roleJefeFinanciero]);
        Permission::create(['name' => 'aproveGeneralDirector', 'description' => 'Aprobación o Anulación general de las Solicitudes mayores a un salario minimo.'])->syncRoles([$roleDirectorFinanciero]);
        Permission::create(['name' => 'aproveTesoreria', 'description' => 'Aprobación o Anulación de Tesoreria y Soportes de las solicitudes de Anticipos de viaticos.'])->syncRoles([$roleTesoreria]);
        Permission::create(['name' => 'aproveContabilidad', 'description' => 'Aprobación o Anulación de Contabilidad de las legalizaciones.'])->syncRoles([$roleContabilidad]);
        Permission::create(['name' => 'report', 'description' => 'Generar y ver los reportes.'])->syncRoles([$roleJefeFinanciero, $roleDirectorFinanciero, $roleContabilidad, $roleTesoreria]);

        //permiso para poder crear una legalizacion desde un reintegro
        Permission::create(['name' => 'legalization.reintegro', 'description' => 'Permite crear una legalización desde un reintegro.']);

        Permission::create(['name' => 'correo.secretaria_gerencia', 'description' => 'LLegan los correos de las solicitudes de anticipos, este es para la secretaria de gerencia.'])->syncRoles([$roleSecretaryGerencia]);;
    }
}
