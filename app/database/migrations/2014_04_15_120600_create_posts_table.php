<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->enum('type', array('regular', 'reblogged'));
            $table->string('search_index');
            $table->integer('blog_id')->unsigned();
            $table->timestamps();
            $table->foreign('blog_id')->references('id')->on('blogs');
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
    Schema::table('posts', function(Blueprint $table) {
      $table->dropForeign('posts_blog_id_foreign');
    });
		Schema::drop('posts');
	}

}
