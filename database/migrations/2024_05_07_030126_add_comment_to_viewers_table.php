<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentToViewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('viewers', function (Blueprint $table) {
            // Add the comment_id column
            $table->foreignId('comment_id')->nullable()->constrained()->onDelete('set null')->after('is_logged_in');
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
            // Drop the comment_id column
            $table->dropForeign(['comment_id']);
            $table->dropColumn('comment_id');
        });
    }
}
