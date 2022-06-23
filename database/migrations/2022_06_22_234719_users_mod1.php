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
        Schema::table('users', function (Blueprint $table) {
            // $table->dropColumn('email');
            // $table->dropColumn('email_verified_at');
            $table->string('username')->unique()->after('id')->nullable();
            $table->string('objectguid')->nullable()->after('username');
            $table->string('email_aux')->after('email');
            $table->string('jobtitle_ldap')->after('email_aux');
            $table->tinyInteger('estado')->default(0)->after('objectguid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->string('email')->unique()->after('name');
            // $table->timestamp('email_verified_at')->nullable()->after('email');
            $table->dropColumn('username');
            $table->dropColumn('objectguid');
            $table->dropColumn('email_aux');
            $table->dropColumn('jobtitle_ldap');
            $table->dropColumn('estado');
        });
    }
};
