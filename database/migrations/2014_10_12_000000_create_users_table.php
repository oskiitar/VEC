<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name', 150);
            $table->string('surname');
            $table->date('birthday')->nullable();
            $table->string('tel', 12);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(0);           
            $table->rememberToken();
        });

        DB::table('users')->insert([
            'name' => 'admin',
            'surname' => 'superadmin',
            'tel' => '609071648',
            'email' => env('MAIL_FROM_ADDRESS'),
            'password' => '$2y$10$7gfThLdEF2EXuMq1C1sMDuSuvCE1gxpTqkDbdnc3RWASqzeovF3FC',
            'email_verified_at' => now(),
            'is_admin' => 1,
        ]);
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
