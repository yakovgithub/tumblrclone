<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRebloggedPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reblogged_posts', function(Blueprint $table) {
			$table->increments('id');
      $table->integer('post_id')->unsigned();
      $table->integer('original_post_id')->unsigned();
      $table->enum('type', array('text', 'image', 'quote', 'link'));
      $table->text('content');
      $table->foreign('post_id')->references('id')->on('posts');
      $table->foreign('original_post_id')->references('id')->on('posts');
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
    Schema::table('reblogged_posts', function(Blueprint $table) {
      $table->dropForeign('reblogged_posts_post_id_foreign');
      $table->dropForeign('reblogged_posts_original_post_id_foreign');
    });
		Schema::drop('reblogged_posts');
	}

}
