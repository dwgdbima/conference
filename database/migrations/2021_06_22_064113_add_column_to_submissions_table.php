<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submissions', function (Blueprint $table) {
            $table->foreignId('topic_id')->after('title')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->dropColumn('topic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submissions', function (Blueprint $table) {
            $table->dropForeign('submissions_topic_id_foreign');
            $table->dropColumn('topic_id');
            $table->string('topic');
        });
    }
}
