<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'nombre' => 'MetroGas',
        ]);
        Empresa::create([
            'nombre' => 'Alcanos',
        ]);
        Empresa::create([
            'nombre' => 'ProGasur',
        ]);
        Empresa::create([
            'nombre' => 'CLC',
        ]);
        Empresa::create([
            'nombre' => 'Gases del Oriente',
        ]);
        Empresa::create([
            'nombre' => 'Invercolsa',
        ]);
    }
}
