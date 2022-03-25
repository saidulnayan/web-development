<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teachername');
            $table->string('teacherid')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('country');
            $table->string('dept');
            $table->string('photo');
            $table->string('nid');
            $table->string('graduation');
            $table->string('post');
            $table->string('strsalary');
            $table->string('joiningdate');
            $table->string('especiality');
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
        Schema::dropIfExists('teachers');
    }
}
