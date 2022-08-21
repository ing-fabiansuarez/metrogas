<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AddRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAuxTesoreria = Role::create(['name' => 'Rol Auxiliar Tesoreria']);
        Permission::create(['name' => 'uploadSupportsTesoreria', 'description' => 'Subir soportes de tesoreria en la solicitud de anticipos.'])->syncRoles([$roleAuxTesoreria]);

        $roleDirecFinanciero = Role::findByName('Rol Director Financiero');
        Permission::create(['name' => 'pagarViaticRequest', 'description' => 'Realizar el pago de la solicitud de anticipos.'])->syncRoles([$roleDirecFinanciero]);

        $roleReportes = Role::create(['name' => 'Rol Reportes']);
        $permisoreporte = Permission::findByName('report');
        $roleReportes->givePermissionTo($permisoreporte);
    }
}
