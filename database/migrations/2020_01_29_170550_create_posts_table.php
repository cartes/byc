<?php

use App\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('picture')->nullable();
            $table->enum('status', [
                Post::PUBLISHED,
                Post::PENDING,
                Post::EXPIRED
            ])->default(Post::PENDING);
            $table->boolean('previous_published')->default(false);
            $table->string('price');
            $table->unsignedBigInteger('commune_id')->nullable();
            $table->foreign('commune_id')->references('id')->on('communes');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
