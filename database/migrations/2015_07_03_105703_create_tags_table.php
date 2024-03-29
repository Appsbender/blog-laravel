<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->timestamps();
        });

        Schema::create('posts_tags', function (Blueprint $table) {
            $table->integer('tags_id')->unsigned()->index();
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');

            $table->integer('posts_id')->unsigned()->index();
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts_tags');
        Schema::drop('tags');
    }
}
