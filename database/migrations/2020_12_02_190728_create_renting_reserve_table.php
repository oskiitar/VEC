<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentingReserveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renting_reserve', function (Blueprint $table) {
            $table->integer('renting_id')->unsigned();
            $table->integer('reserve_id')->unsigned();
            $table->foreign('renting_id')->references('id')->on('rentings');
            $table->foreign('reserve_id')->references('id')->on('reserves');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renting_reserve');
    }
}
