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
        Schema::create('other_item_viatic_request', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('viatic_request_id');
            $table->unsignedBigInteger('other_item_id');

            $table->foreign('viatic_request_id')->references('id')->on('viatic_requests');
            $table->foreign('other_item_id')->references('id')->on('other_items');

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
        Schema::dropIfExists('other_item_viatic_request');
    }
};
