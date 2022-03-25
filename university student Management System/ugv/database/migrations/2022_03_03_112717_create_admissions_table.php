<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('studentid')->unique();
            $table->string('semester')->default('1st');
            $table->string('regno')->unique();
            $table->string('category');
            $table->string('studentemail');
            $table->string('studentphone');
            $table->string('nid');
            $table->string('birth');
            $table->string('address');
            $table->string('country');
            $table->string('dept');
            $table->string('session');
            $table->string('year');
            $table->string('section');
            $table->string('Photo');
            $table->string('parrentid');
            $table->string('parrentphone');
            $table->string('semfees');
            $table->string('examfees');
            $table->string('payment')->default('0');
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
        Schema::dropIfExists('admissions');
    }
}
