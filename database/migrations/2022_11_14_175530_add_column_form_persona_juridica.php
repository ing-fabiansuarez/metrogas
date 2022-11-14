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
            $table->string('forma_juridica')->nullable();
            $table->string('ciudad_infor_solicitante')->nullable();
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
            $table->dropColumn('forma_juridica');
            $table->dropColumn('ciudad_infor_solicitante');
        });
    }
};
