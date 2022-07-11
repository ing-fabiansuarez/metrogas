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
        Schema::create('legalizations', function (Blueprint $table) {
            $table->id();
            $table->string('justification');

            //relacion que va a tener con las viaticRequest, si es nulo es porque es un reintegro
            $table->unsignedBigInteger('viatic_request_id')->nullable();
            $table->foreign("viatic_request_id")
                ->references("id")
                ->on("viatic_requests");

            //relacion de la person aque hace la solicitud
            $table->unsignedBigInteger('created_by');
            $table->foreign("created_by")
                ->references("id")
                ->on("users");

            $table->tinyInteger('sw_state');

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
        Schema::dropIfExists('legalizations');
    }
};
