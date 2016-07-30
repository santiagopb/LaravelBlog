<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->integer('parent')->unsigned()->nullable();
            $table->string('author_name');
            $table->string('author_email');
            $table->text('comment');
            $table->boolean('approved');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('comments', function($table) {
            //$table->foreign('parent')->references('id')->on('comments')->onDelete('cascade');
            //$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropForeign('comments_post_id_foreign');
        //Schema::dropForeign('comments_parent_foreign');
        Schema::drop('comments');
    }
}
