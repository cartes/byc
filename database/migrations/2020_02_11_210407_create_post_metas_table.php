<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->string('transaction')->nullable();
            $table->string('estate')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('version')->nullable();
            $table->string('year')->nullable();
            $table->string('fuel')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('plate')->nullable();
            $table->string('kilometers')->nullable();
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
        Schema::dropIfExists('post_metas');
    }
}
