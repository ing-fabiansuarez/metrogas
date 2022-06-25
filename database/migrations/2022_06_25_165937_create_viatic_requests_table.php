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
            $table->string('justification', 500);
            $table->timestamps();

             //relacion del cargo
             $table->unsignedBigInteger('request_by');
             $table->foreign("request_by")
                 ->references("id")
                 ->on("users")
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
