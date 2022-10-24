<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_preoperacional_motos', function (Blueprint $table) {
            $table->id();
            $table->string('cedula');
            $table->string('nombre_completo');
            $table->string('correo');
            $table->string('lugar_trabajo');
            $table->string('area');
            $table->string('placa_vehiculo');
            $table->integer('modelo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_preoperacional_motos');
    }
};
