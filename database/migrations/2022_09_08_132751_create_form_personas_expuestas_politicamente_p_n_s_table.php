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
        Schema::create('form_personas_expuestas_politicamente_p_n_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_persona_natural_id');
            $table->foreign("form_persona_natural_id")
                ->references("id")
                ->on("form_persona_naturals");
            $table->string('nombre');
            $table->string('grado_de_parentezco');
            $table->string('tipo_de_identificacion');
            $table->string('numero_de_identificacion');
            $table->string('entidad');
            $table->string('cargo');
            $table->string('fecha_vinculacion');
            $table->string('fecha_desvinculacion');

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
        Schema::dropIfExists('form_personas_expuestas_politicamente_p_n_s');
    }
};
