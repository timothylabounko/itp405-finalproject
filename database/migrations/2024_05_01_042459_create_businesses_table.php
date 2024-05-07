<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('businesses', function (Blueprint $table) {
        $table->id();
        $table->string('business_name');
        $table->string('business_address');
        $table->string('business_phone');
        $table->string('business_type');
        $table->decimal('business_lat', 10, 8);
        $table->decimal('business_long', 11, 8);
        $table->integer('year_founded');
        $table->integer('year_closed')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
