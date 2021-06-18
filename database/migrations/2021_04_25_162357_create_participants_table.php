<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('salutation');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_of_date');
            $table->string('gender');
            $table->string('institution');
            $table->string('phone')->unique();
            $table->string('fax')->nullable();
            $table->string('street');
            $table->string('city');
            $table->string('zip_code')->nullable();
            $table->string('country');
            $table->string('photo')->default('dist/img/profile-default.jpg');
            $table->string('info')->nullable();
            $table->string('participation');
            $table->string('research');
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
        Schema::dropIfExists('participants');
    }
}
