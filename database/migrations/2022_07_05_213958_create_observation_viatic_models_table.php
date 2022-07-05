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
        Schema::create('observation_viatic_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('viatic_request_id');
            $table->foreign("viatic_request_id")
                ->references("id")
                ->on("viatic_requests");

            $table->unsignedBigInteger('create_by');
            $table->foreign("create_by")
                ->references("id")
                ->on("users");

            $table->string('message');

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
        Schema::dropIfExists('observation_viatic_models');
    }
};
