<?php

namespace Database\Seeders;

use App\Models\TypeIdentification;
use Illuminate\Database\Seeder;

class TypeIdentificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeIdentification::create(['name' => 'Cedula de Ciudadania', 'abrev' => 'CC']);
        TypeIdentification::create(['name' => 'Numero de Identificación Tributaria', 'abrev' => 'NIT']);
        TypeIdentification::create(['name' => 'Tarjeta de Identidad', 'abrev' => 'TI']);
    }
}
