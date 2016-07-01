<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::enableForeignKeyConstraints();
        Schema::create('ports', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('oid_id')->unsigned()->nullable();
			$table->string('name');
            $table->timestamps();

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
        Schema::drop('ports');
    }
}
