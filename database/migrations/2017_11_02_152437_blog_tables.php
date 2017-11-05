<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table){
           $table->increments('id');
           $table->string('section');
           $table->timestamps();
           $table->softDeletes();
        });

        Schema::create('tags', function (Blueprint $table){
           $table->increments('id');
           $table->string('tag');
           $table->timestamps();
           $table->softDeletes();
        });

        Schema::create('posts', function (Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->longText('body');
            $table->integer('section_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('section_id')->references('id')->on('sections');
        });

        Schema::create('posts_tags', function (Blueprint $table){
            $table->increments('id');
            $table->integer('tag_id')->unsigned();
            $table->integer('post_id')->unsigned();
        });

        Schema::table('posts_tags', function (Blueprint $table){
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('post_id')->references('id')->on('posts');
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
        Schema::drop('posts');
        Schema::drop('tags');
        Schema::drop('sections');
    }
}
