<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToBusinessPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_points', function (Blueprint $table) {
            $table->string('naics_code')->nullable();
            $table->string('year_founded');
            $table->string('year_closed')->nullable();
            $table->text('business_photos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_points', function (Blueprint $table) {
            $table->dropColumn('naics_code');
            $table->dropColumn('year_founded');
            $table->dropColumn('year_closed');
            $table->dropColumn('business_photos');
        });
    }
}