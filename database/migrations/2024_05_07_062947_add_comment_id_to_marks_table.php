<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentIdToMarksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->foreignId('comment_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->dropForeign(['comment_id']);
            $table->dropColumn('comment_id');
        });
    }
}
