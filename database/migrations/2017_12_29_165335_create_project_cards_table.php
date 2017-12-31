<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_projects')->unsigned();
            $table->integer('id_cards')->unsigned();
            $table->timestamps();
        });

        Schema::table('project_cards', function (Blueprint $table) {
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
        Schema::dropIfExists('project_cards');
    }
}
