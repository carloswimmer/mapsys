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
            $table->increments('host_id')->unsigned()->nullable();
            $table->increments('port_plus_oid_id')->unsigned()->nullable();
            $table->increments('link_b_id')->unsigned()->nullable();
            $table->timestamps();

			$table->foreign('host_id')->references('id')->on('hosts')->onDelete('cascade');
			$table->foreign('port_plus_oid_id')->references('id')->on('port_plus_oids')->onDelete('cascade');
			$table->foreign('link_b_id')->references('id')->on('link_bs')->onDelete('cascade');
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
