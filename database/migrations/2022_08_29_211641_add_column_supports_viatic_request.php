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
        Schema::table('supports_viatic_requests', function (Blueprint $table) {
            $table->tinyInteger('type_support')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supports_viatic_requests', function (Blueprint $table) {
            $table->dropColumn('type_support');
        });
    }
};
