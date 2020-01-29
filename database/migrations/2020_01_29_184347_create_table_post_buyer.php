<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePostBuyer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_buyer', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->unsignedBigInteger('buyer_id');
            $table->foreign('buyer_id')->references('id')->on('buyers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_buyer');
    }
}
