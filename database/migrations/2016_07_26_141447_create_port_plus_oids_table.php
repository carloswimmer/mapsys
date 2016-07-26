<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortPlusOidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::enableForeignKeyConstraints();
        Schema::create('port_plus_oids', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('port_id')->unsigned()->nullable();
			$table->integer('oid_id')->unsigned()->nullable();
            $table->timestamps();

			$table->foreign('port_id')->references('id')->on('ports');
			$table->foreign('oid_id')->references('id')->on('oids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('port_plus_oids');
    }
}
