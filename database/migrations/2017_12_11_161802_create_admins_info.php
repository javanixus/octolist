<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 50)->unique();
            $table->string('phone', 20)->unique()->nullable();
            $table->string('avatar',255)->nullable();
            $table->timestamps();
            $table->integer('id_admins')->unsigned();
        });

        Schema::table('admins_info', function (Blueprint $table) {
            $table->foreign('id_admins')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
