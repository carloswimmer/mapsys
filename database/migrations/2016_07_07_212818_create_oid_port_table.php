<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOidPortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oid_port', function (Blueprint $table) {
            $table->integer('oid_id')->unsigned()->nullable();
            $table->foreign('oid_id')->references('id')->on('oids')->onDelete('cascade');

            $table->integer('port_id')->unsigned()->nullable();
            $table->foreign('port_id')->references('id')->on('ports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('oid_port');
    }
}
