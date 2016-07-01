<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwitchModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::enableForeignKeyConstraints();
        Schema::create('switch_models', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('port_id')->unsigned()->nullable();
            $table->string('name');
            $table->timestamps();

			$table->foreign('port_id')->references('id')->on('ports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('switch_models');
    }
}
