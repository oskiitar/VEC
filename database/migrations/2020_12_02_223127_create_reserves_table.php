<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->integerIncrements('id');     
            $table->dateTime('reserve_date');
            $table->unsignedInteger('client_id'); 
            $table->unsignedInteger('pay_id');          
            $table->foreign('client_id')->references('user_id')->on('clients')->onUpdate('cascade');
            $table->foreign('pay_id')->references('id')->on('pays');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserves');
    }
}
