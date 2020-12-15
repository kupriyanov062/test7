<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referenses_deposits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wallet_id')->unsigned()->default(1);
            $table->foreign('wallet_id')->references('id')->on('wallets');
            $table->integer('depoit_id')->unsigned();
            $table->foreign('depoit_id')->references('id')->on('deposits');
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
        Schema::dropIfExists('referenses_deposits');
    }
}
