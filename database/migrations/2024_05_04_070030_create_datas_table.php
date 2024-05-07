<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datas', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('business_address');
            $table->string('business_phone');
            $table->string('business_type');
            $table->string('business_lat');
            $table->string('business_long');
            $table->string('year_founded');
            $table->string('year_closed')->nullable();
            $table->string('naics_code');
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
        Schema::dropIfExists('datas');
    }
}
