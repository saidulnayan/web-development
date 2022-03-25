<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('studentid');
            $table->string('studentname');
            $table->string('sem');
            $table->string('dept');
            $table->string('category');
            $table->string('subname');
            $table->string('subcode');
            $table->string('examtype');
            $table->string('attenmarks');
            $table->string('assignment');
            $table->string('quizmarks');
            $table->string('written');
            $table->string('gpa');
            $table->string('cgpa');
            $table->string('credit');
            $table->string('letter');
            $table->string('teacherid');
            $table->string('publish');
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
        Schema::dropIfExists('results');
    }
}
