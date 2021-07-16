<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('file');
            $table->integer('first_decision')->default(0);
            $table->text('note_admin')->nullable();
            $table->string('file_admin')->nullable();
            $table->string('file_first_revise')->nullable();
            $table->integer('file_first_revise_status')->default(1);
            $table->integer('recomendation')->default(0);
            $table->text('note_reviewer')->nullable();
            $table->string('file_reviewer')->nullable();
            $table->string('file_second_revise')->nullable();
            $table->integer('file_second_revise_status')->default(1);
            $table->integer('final_decision')->default(0);
            $table->string('file_final')->nullable();
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
        Schema::dropIfExists('papers');
    }
}
