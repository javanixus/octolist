<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_students')->unsigned();
            $table->integer('id_cards')->unsigned();
            $table->timestamps();
        });


        Schema::table('cards_members', function (Blueprint $table) {
            $table->foreign('id_students')
                ->references('id')
                ->on('users');
        });

        Schema::table('cards_members', function (Blueprint $table) {
            $table->foreign('id_cards')
                ->references('id')
                ->on('cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards_members');
    }
}
