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
        Schema::create('jobtitles', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            //relacion del cargo
            $table->unsignedBigInteger('id_boss')->nullable();
            $table->foreign("id_boss")
                ->references("id")
                ->on("jobtitles")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->tinyInteger('level');

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
        Schema::dropIfExists('jobtitles');
    }
};
