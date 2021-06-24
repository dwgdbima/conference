<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbstractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abstracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('file');
            $table->integer('status_admin')->default(1);
            $table->string('comment_admin')->nullable();
            $table->string('file_admin')->nullable();
            $table->integer('status_reviewer')->default(1);
            $table->string('comment_reviewer')->nullable();
            $table->string('file_reviewer')->nullable();
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
        Schema::dropIfExists('abstracts');
    }
}
