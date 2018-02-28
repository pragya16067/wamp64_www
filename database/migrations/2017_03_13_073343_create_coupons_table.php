<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
            $table->string('email');
			$table->string('rfid')->nullable();
			$table->string('rollno');
			$table->double('startbalance')->nullable();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->integer('breakfast')->nullable();
			$table->integer('lunch')->nullable();
			$table->integer('snacks')->nullable();
			$table->integer('dinner')->nullable();
			$table->boolean('blocked')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
