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
        Schema::create('viatic_requests', function (Blueprint $table) {
            $table->id();
            $table->string('justification', 500)->nullable();
            $table->timestamps();

            //relacion de la person aque hace la solicitud
            $table->unsignedBigInteger('request_by')->nullable();
            $table->foreign("request_by")
                ->references("id")
                ->on("users")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            //relacion del sitio origen
            $table->unsignedBigInteger('origin_site')->nullable();
            $table->foreign("origin_site")
                ->references("id")
                ->on("origin_sites")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            //relacion del sitio destino
            $table->unsignedBigInteger('destination_site')->nullable();
            $table->foreign("destination_site")
                ->references("id")
                ->on("destination_sites")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viatic_requests');
    }
};
