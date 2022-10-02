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
        Schema::table('form_persona_juridicas', function (Blueprint $table) {
            $table->string('nombre_quien_diligencia')->nullable();
            $table->string('cedula_quien_diligencia')->nullable();
            $table->string('celular_quien_diligencia')->nullable();
            $table->string('cargo_quien_diligencia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_persona_juridicas', function (Blueprint $table) {
            $table->dropColumn('nombre_quien_diligencia');
            $table->dropColumn('cedula_quien_diligencia');
            $table->dropColumn('celular_quien_diligencia');
            $table->dropColumn('cargo_quien_diligencia');
        });
    }
};
