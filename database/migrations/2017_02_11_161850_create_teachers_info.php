<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nip')->unique()->nullable();
            $table->string('name');
            $table->string('email', 50)->unique();
            $table->string('bio', 255)->nullable();
            $table->enum('gender',['f','m'])->nullable();
            $table->string('phone', 20)->unique()->nullable();
            $table->string('avatar',255)->nullable();
            $table->integer('id_teachers')->unsigned();
            $table->timestamps();
        });

        Schema::table('teachers_info', function (Blueprint $table) {
            $table->foreign('id_teachers')
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
