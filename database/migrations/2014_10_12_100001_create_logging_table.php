<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoggingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logging', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('heroine');
            $table->boolean('promoted');
            $table->integer('new_level');
            $table->dateTime('promotion_received');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logging');
    }
}
