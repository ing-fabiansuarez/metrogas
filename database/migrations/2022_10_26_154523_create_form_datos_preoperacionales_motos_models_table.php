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
        Schema::create('form_datos_preoperacionales_motos_models', function (Blueprint $table) {
            $table->id();
            $table->string('cedula');
            $table->string('nombre_completo');
            $table->string('correo');
            $table->string('lugar_trabajo');
            $table->string('area');
            $table->string('placa_vehiculo');
            $table->integer('modelo');
            $table->integer('cargo');
            $table->integer('kilometraje_inicio_jornada');

            $table->tinyInteger('niveles_aceite');

            $table->tinyInteger('luz_delantera');
            $table->tinyInteger('direccionales_delantera');
            $table->tinyInteger('direccionales_traseras');
            $table->tinyInteger('stop');

            $table->tinyInteger('presion_labrado_llanta_delantera');
            $table->tinyInteger('presion_labrado_llanta_trasera');
            $table->tinyInteger('rin_delantero');
            $table->tinyInteger('rin_trasero');

            $table->tinyInteger('testigos_tacometros');
            $table->tinyInteger('tanque_gasolina');
            $table->tinyInteger('cojin_argonomico');
            $table->tinyInteger('placa_visible');
            $table->tinyInteger('moto_aseada');
            $table->tinyInteger('comandos_acelerador_buen_estado');
            $table->tinyInteger('freno_delantero');
            $table->tinyInteger('freno_trasero');
            $table->tinyInteger('relacion');
            $table->tinyInteger('suspencion');
            $table->tinyInteger('niveles_fluidos');
            $table->tinyInteger('direccion');
            $table->tinyInteger('pito');
            $table->tinyInteger('espejos_retrovisores');
            $table->tinyInteger('casco_certificado');
            $table->tinyInteger('chaleco');
            $table->tinyInteger('coderas_rodilleras');
            $table->tinyInteger('guantes');
            $table->tinyInteger('reposapies');

            $table->tinyInteger('soat');
            $table->tinyInteger('rtm');
            $table->tinyInteger('licencia_de_conduccion');
            $table->tinyInteger('tarjeta_de_propiedad');

            $table->string('observacion');

            $table->string('fotografia_tacometro');
            $table->string('fotografia_mantenimiento');

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
        Schema::dropIfExists('form_datos_preoperacionales_motos_models');
    }
};
