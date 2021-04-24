<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('salutation')->after('id');
            $table->string('first_name')->after('salutation')->nullable();
            $table->string('last_name')->after('first_name')->nullable();
            $table->date('birth_of_date')->after('last_name');
            $table->string('gender')->after('birth_of_date');
            $table->string('institution')->after('gender');
            $table->string('phone')->unique()->after('institution');
            $table->string('fax')->nullable()->after('phone');
            $table->string('street')->after('fax');
            $table->string('city')->after('street');
            $table->string('zip_code')->nullable()->after('city');
            $table->string('country')->after('zip_code');
            $table->string('photo')->after('country');
            $table->string('info')->after('photo')->nullable();
            $table->string('participation')->after('info');
            $table->string('research')->after('participation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('salutation');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('birth_of_date');
            $table->dropColumn('gender');
            $table->dropColumn('institution');
            $table->dropColumn('phone');
            $table->dropColumn('fax');
            $table->dropColumn('street');
            $table->dropColumn('city');
            $table->dropColumn('zip_code');
            $table->dropColumn('country');
            $table->dropColumn('photo');
            $table->dropColumn('info');
            $table->dropColumn('participation');
            $table->dropColumn('research');
        });
    }
}
