<?php

use App\Enums\EActivoInactivo;
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
        Schema::table('datos_preoperacionals', function (Blueprint $table) {
            $table->tinyInteger('active')->default(EActivoInactivo::ACTIVO->getId());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datos_preoperacionals', function (Blueprint $table) {
            $table->dropColumn('active');
        });
    }
};
