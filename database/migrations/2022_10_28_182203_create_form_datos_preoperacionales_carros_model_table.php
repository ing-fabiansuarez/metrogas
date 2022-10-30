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
        Schema::create('form_datos_preoperacionales_carros_models', function (Blueprint $table) {
            $table->id();
            $table->string('cedula');
            $table->string('nombre_completo');
            $table->string('correo');
            $table->string('lugar_trabajo');
            $table->string('area');
            $table->string('placa_vehiculo');
            $table->integer('modelo');
            $table->string('cargo');
            $table->tinyInteger('tipo_vehiculo');
            
            $table->integer('kilometraje_inicio_jornada');

            $table->tinyInteger('niveles_aceite');

            $table->tinyInteger('luces_retroceso_parqueo');
            $table->tinyInteger('luces_altas_bajas');
            $table->tinyInteger('direccionales_delanteras');
            $table->tinyInteger('direccionales_traseras');


            $table->tinyInteger('pito_bocina');

            $table->tinyInteger('espejos_centrales_laterales');
            $table->tinyInteger('puertas_acceso_vehiculo');
            $table->tinyInteger('vidrio_frontal');
            $table->tinyInteger('vidrios_laterales_trasero');
            $table->tinyInteger('indicadores');


            $table->tinyInteger('llantas_esparragos');
            $table->tinyInteger('rudas_buen_estado');
            $table->tinyInteger('llanta_repuesto');
            $table->tinyInteger('presion');


            $table->tinyInteger('caja_cambios');
            $table->tinyInteger('pedales');
            $table->tinyInteger('latas_pintura');
            $table->tinyInteger('freno_emergencia');
            $table->tinyInteger('nivel_fluidos');


            $table->tinyInteger('conos_reflectivos');
            $table->tinyInteger('gato');
            $table->tinyInteger('linterna');
            $table->tinyInteger('cruceta');
            $table->tinyInteger('senales');
            $table->tinyInteger('tacos');
            $table->tinyInteger('caja_herramienta');
            $table->tinyInteger('llantas_repuesto');


            $table->tinyInteger('extintor');
            $table->tinyInteger('botiquin');


            $table->tinyInteger('soat');
            $table->tinyInteger('rtm');
            $table->tinyInteger('licencia_conduccion');
            $table->tinyInteger('tarjeta_propuedad');

            $table->string('observacion');

            $table->string('fotografia_vehiculos')->nullable();
            $table->string('fotografia_mantenimiento')->nullable();

            $table->tinyInteger('ha_diligenciado_ud_mismo');

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
        Schema::dropIfExists('form_datos_preoperacionales_carros_models');
    }
};
