<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::enableForeignKeyConstraints();
        Schema::create('hosts', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('switch_model_id')->unsigned()->nullable();
			$table->integer('submap_id')->unsigned()->nullable();
			$table->integer('elementid');
			$table->string('name');
            $table->timestamps();

			$table->foreign('submap_id')->references('id')->on('submaps')->onDelete('cascade');
			$table->foreign('switch_model_id')->references('id')->on('switch_models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hosts');
    }
}
