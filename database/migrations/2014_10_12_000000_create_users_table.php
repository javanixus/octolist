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
            $table->increments('id');
            $table->integer('nis')->unique();
            $table->string('name');
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->string('email', 50)->unique();
            $table->string('bio', 255)->nullable();
            $table->enum('gender',['f','m'])->nullable();
            $table->string('phone', 13)->nullable();
            $table->string('avatar',255)->nullable();
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
        Schema::dropIfExists('users');
    }
}
