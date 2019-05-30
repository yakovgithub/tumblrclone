<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('likes', function(Blueprint $table) {
			$table->increments('id');
      $table->integer('post_id')->unsigned();
      $table->integer('user_id')->unsigned();
			$table->timestamps();
      $table->foreign('post_id')->references('id')->on('posts');
      $table->foreign('user_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::table('likes', function(Blueprint $table) {
      $table->dropForeign('likes_post_id_foreign');
      $table->dropForeign('likes_user_id_foreign');
    });
		Schema::drop('likes');
	}

}
