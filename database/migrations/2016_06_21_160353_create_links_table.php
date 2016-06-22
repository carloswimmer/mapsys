<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::enableForeignKeyConstraints();
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('host_id')->unsigned()->nullable();
			$table->integer('switchmodel_id')->unsigned()->nullable();
			$table->integer('host_id')->unsigned()->nullable();
			$table->integer('switchmode_id')->unsigned()->nullable();
            $table->timestamps();

			$table->foreign('host_id')->reference('id')->on('hosts');
			$table->foreign('switchmodel_id')->reference('id')->on('switchmodels');
			$table->foreign('host_id')->reference('id')->on('hosts');
			$table->foreign('switchmodel_id')->reference('id')->on('switchmodels');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('links');
    }
}
