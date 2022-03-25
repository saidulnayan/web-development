<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('strtime');
            $table->string('endtime');
            $table->string('location');
            $table->string('teacherid');
            $table->string('teachername');
            $table->string('subcode');
            $table->string('subname');
            $table->string('semester');
            $table->string('dept');
            $table->string('category');
            $table->string('routinetype');
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
        Schema::dropIfExists('routines');
    }
}
