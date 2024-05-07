<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->foreignId('viewer_id')->constrained()->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->dropForeign(['viewer_id']);
            $table->dropColumn('viewer_id');
        });
    }

};
