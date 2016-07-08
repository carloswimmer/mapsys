<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortSwitchModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('port_switch_model', function (Blueprint $table) {
            $table->integer('port_id')->unsigned()->nullable();
            $table->foreign('port_id')->references('id')->on('ports')->onDelete('cascade');

            $table->integer('switch_model_id')->unsigned()->nullable();
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
        Schema::drop('port_switch_model');
    }
}
