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
        Schema::create('supports_legalizations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('legalization_id');
            $table->foreign("legalization_id")
                ->references("id")
                ->on("legalizations");

            $table->string('url');
            $table->string('company');

            $table->unsignedBigInteger('created_by');
            $table->foreign("created_by")
                ->references("id")
                ->on("users");

            $table->string('date_factura');
            $table->double('total_factura');

            $table->unsignedBigInteger('type_identification');
            $table->foreign("type_identification")
                ->references("id")
                ->on("type_identifications");

            $table->string('number_identification');

            $table->string('observation');

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
        Schema::dropIfExists('supports_legalizations');
    }
};
