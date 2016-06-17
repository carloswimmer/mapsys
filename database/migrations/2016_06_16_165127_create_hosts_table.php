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
			$table->integer('switchmodel_id')->unsigned()->nullable();
			$table->integer('submap_id')->unsigned()->nullable();
			$table->integer('elementid');
			$table->string('name');
            $table->timestamps();

			$table->foreign('submap_id')->references('id')->on('submaps');
			$table->foreign('switchmodel_id')->references('id')->on('switchmodels');
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
