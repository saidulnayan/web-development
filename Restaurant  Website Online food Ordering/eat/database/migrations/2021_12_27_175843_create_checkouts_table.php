<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('mark')->nullable();
            $table->string('mrks');
            $table->string('name');
            $table->string('orderid');
            $table->string('product');
            $table->string('cost');
            $table->string('address');
            $table->string('payment');
            $table->string('email');
            $table->string('accept');
            $table->string('disable');
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
        Schema::dropIfExists('checkouts');
    }
}
