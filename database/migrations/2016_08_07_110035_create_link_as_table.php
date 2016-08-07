<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkAsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_as', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('host_id')->unsigned()->nullable();
            $table->integer('port_plus_oid_id')->unsigned()->nullable();
            $table->timestamps();

			$table->foreign('host_id')->references('id')->on('hosts')->onDelete('cascade');
			$table->foreign('port_plus_oid_id')->references('id')->on('port_plus_oids')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('link_as');
    }
}
