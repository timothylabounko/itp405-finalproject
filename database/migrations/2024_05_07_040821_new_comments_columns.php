<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewCommentsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->foreignId('viewer_id')->nullable()->after('id'); // Adding nullable() in case there are existing comments without a viewer_id
            $table->foreign('viewer_id')->references('id')->on('viewers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['viewer_id']);
            $table->dropColumn('viewer_id');
        });
    }
}
