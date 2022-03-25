<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('studentid');
            $table->string('studentname');
            $table->string('semester');
            $table->string('category');
            $table->string('dept');
            $table->string('subcode');
            $table->string('dailyattd');
            $table->string('totalclass');
            $table->string('dailyattprcnt');
            $table->string('dailyattmarks');
            $table->string('totalattprcnt');
            $table->string('totalattmarks');
            $table->string('teacherid');
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
        Schema::dropIfExists('attendances');
    }
}
