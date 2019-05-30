<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts_tags', function(Blueprint $table) {
			$table->increments('id');
      $table->integer('post_id')->unsigned();
      $table->integer('tag_id')->unsigned();
			$table->timestamps();
      $table->foreign('post_id')->references('id')->on('posts');
      $table->foreign('tag_id')->references('id')->on('tags');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::table('posts_tags', function(Blueprint $table) {
      $table->dropForeign('posts_tags_post_id_foreign');
      $table->dropForeign('posts_tags_tag_id_foreign');
    });
		Schema::drop('posts_tags');
	}

}
