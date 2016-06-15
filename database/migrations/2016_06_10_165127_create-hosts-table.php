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
			$table->integer('switchmodel')->unsigned();
			$table->foreign('switchmodel')->references('id')->on('switchmodels');
			$table->integer('submap')->unsigned();
			$table->foreign('submap')->references('id')->on('submaps');
			$table->integer('elementid');
			$table->string('name');
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
        Schema::drop('hosts');
    }
}
