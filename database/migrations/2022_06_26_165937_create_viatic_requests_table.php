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

            //relacion de la person aque hace la solicitud
            $table->unsignedBigInteger('request_by');
            $table->foreign("request_by")
                ->references("id")
                ->on("users");

            $table->integer('sw_state');

            $table->string('url_aceptation')->nullable();

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
        Schema::dropIfExists('viatic_requests');
    }
};
