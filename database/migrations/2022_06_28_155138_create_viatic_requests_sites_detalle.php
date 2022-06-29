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
        Schema::create('viatic_requests_sites_detalle', function (Blueprint $table) {
            $table->id();

            //relacion de sitio origen
            $table->unsignedBigInteger('viatic_request_id')->nullable();
            $table->foreign("viatic_request_id")
                ->references("id")
                ->on("viatic_requests");

            //relacion de sitio origen
            $table->unsignedBigInteger('id_origin_site')->nullable();
            $table->foreign("id_origin_site")
                ->references("id")
                ->on("origin_sites");

            //relacion de sitio origen
            $table->unsignedBigInteger('id_destination_site')->nullable();
            $table->foreign("id_destination_site")
                ->references("id")
                ->on("destination_sites");

            $table->date('start_date');
            $table->date('end_date');

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
        Schema::dropIfExists('viatic_requests_sites_detalle');
    }
};
