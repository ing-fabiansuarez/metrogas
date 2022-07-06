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
        Schema::create('supports_viatic_requests', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('viatic_request_id');
            $table->foreign("viatic_request_id")
                ->references("id")
                ->on("viatic_requests");

            $table->string('url');
            $table->string('observation');

            $table->unsignedBigInteger('created_by');
            $table->foreign("created_by")
                ->references("id")
                ->on("users");

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
        Schema::dropIfExists('supports_viatic_requests');
    }
};
