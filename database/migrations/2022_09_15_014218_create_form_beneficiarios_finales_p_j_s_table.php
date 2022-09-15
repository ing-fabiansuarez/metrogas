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
        Schema::create('form_beneficiarios_finales_p_j_s', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('form_persona_juridica_id');
            $table->foreign("form_persona_juridica_id")
                ->references("id")
                ->on("form_persona_juridicas");

            $table->string('razon_social');
            $table->string('tipo_identificacion');
            $table->string('num_identificacion');
            $table->string('porcentaje_participacion');

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
        Schema::dropIfExists('form_beneficiarios_finales_p_j_s');
    }
};
