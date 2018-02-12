<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nis',15)->unique();
            $table->string('name');
            $table->string('email', 50)->unique();
            $table->string('bio', 255)->nullable();
            $table->enum('gender',['f','m'])->nullable();
            $table->string('phone', 20)->unique()->nullable();
            $table->string('avatar',255)->nullable();
            $table->integer('id_class')->unsigned()->nullable();
            $table->integer('id_major')->unsigned()->nullable();
            $table->integer('id_students')->unsigned();
            $table->enum('new', [0 , 1])->default(0);
            $table->timestamps();
        });

        Schema::table('students_info', function (Blueprint $table) {
            $table->foreign('id_students')
                ->references('id')
                ->on('users');
        });

        Schema::table('students_info',function (Blueprint $table) {
            $table->foreign('id_major')
                ->references('id')
                ->on('majors');
        });

        Schema::table('students_info', function (Blueprint $table) {
            $table->foreign('id_class')
                ->references('id')
                ->on('classes');
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
