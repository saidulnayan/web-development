<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('studentid');
            $table->string('studentname');
            $table->string('sem');
            $table->string('attendance');
            $table->string('payable');
            $table->string('paid');
            $table->string('due');
            $table->string('remarks');
            $table->string('dept');
            $table->string('category');
            $table->string('status');
            $table->string('permission');
            $table->string('cgpa');
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
        Schema::dropIfExists('students');
    }
}
