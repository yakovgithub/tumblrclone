<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegularPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('regular_posts', function(Blueprint $table) {
			$table->increments('id');
      $table->integer('post_id')->unsigned();
      $table->enum('type', array('text', 'video', 'audio', 'image', 'quote', 'chat', 'link'));
      $table->text('content');
			$table->timestamps();
      $table->foreign('post_id')->references('id')->on('posts');
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
    Schema::table('regular_posts', function(Blueprint $table) {
      $table->dropForeign('regular_posts_post_id_foreign');
    });
		Schema::drop('regular_posts');
	}

}
