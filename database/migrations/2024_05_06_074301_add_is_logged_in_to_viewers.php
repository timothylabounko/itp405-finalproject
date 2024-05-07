<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsLoggedInToViewers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('viewers', function (Blueprint $table) {
            $table->boolean('is_logged_in')->default(false)->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('viewers', function (Blueprint $table) {
            $table->dropColumn('is_logged_in');
        });
    }
}