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
        Schema::table('viatic_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('centro_de_costos_id')->nullable();
            $table->foreign("centro_de_costos_id")
                ->references("id")
                ->on("centro_de_costos");
            $table->string('num_identification')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('viatic_requests', function (Blueprint $table) {
            $table->dropColumn('centro_de_costos_id');
            $table->dropColumn('num_identification');
        });
    }
};
