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
            $table->string('support_composicion_accionaria')->nullable();
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
            $table->dropColumn('support_composicion_accionaria');
        });
    }
};
