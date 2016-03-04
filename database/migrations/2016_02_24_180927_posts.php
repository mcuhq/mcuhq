<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // blog table
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned()->default(0);
            $table->foreign('author_id')
              ->references('id')->on('users')
              ->onDelete('cascade');
            $table->string('title')->unique();
            $table->string('more_info_link'); // i.e github/bitbucket link, blog url, etc
            $table->string('source_link'); // i.e github/bitbucket link, blog url, etc
            $table->text('body'); // raw markdown user input
            $table->text('body_html'); // markdown converted into html so as to not convert everytime
            $table->string('slug')->unique();
            $table->boolean('active');

            $table->integer('view_count')->default(0);

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
        //drop the table
        Schema::drop('posts');
    }
}
