<?php

namespace Database\Seeders;

use App\Models\DestinationSite;
use App\Models\OriginSite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DestinationSite::create(['name' => 'Floridablanca']);
        DestinationSite::create(['name' => 'Bucaramanga']);
        DestinationSite::create(['name' => 'Bogotá']);
        DestinationSite::create(['name' => 'Cartagena']);
        DestinationSite::create(['name' => 'Barranquilla']);
        DestinationSite::create(['name' => 'Medellin']);
        DestinationSite::create(['name' => 'Ocaña']);
        DestinationSite::create(['name' => 'Rio de Oro']);
        DestinationSite::create(['name' => 'San Gil']);

        OriginSite::create(['name' => 'Floridablanca']);
        OriginSite::create(['name' => 'Bucaramanga']);
        OriginSite::create(['name' => 'Bogotá']);
        OriginSite::create(['name' => 'Cartagena']);
        OriginSite::create(['name' => 'Barranquilla']);
        OriginSite::create(['name' => 'Medellin']);
        OriginSite::create(['name' => 'Ocaña']);
        OriginSite::create(['name' => 'Rio de Oro']);
        OriginSite::create(['name' => 'San Gil']);
    }
}
