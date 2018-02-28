<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostels', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
            $table->string('email');
			$table->string('rfid')->nullable();
			$table->string('rollno')->nullable();
			$table->double('mobile')->nullable();
			$table->date('out_date')->nullable();
			$table->time('out_time')->nullable();
			$table->string('place')->nullable();
			$table->string('purpose')->nullable();
			$table->date('in_date')->nullable();
			$table->time('in_time')->nullable();
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
        Schema::dropIfExists('hostels');
    }
}
