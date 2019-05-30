<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFollowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('follows', function(Blueprint $table) {
			$table->increments('id');
      $table->integer('blog_id')->unsigned();
      $table->integer('user_id')->unsigned();
      $table->timestamps();
      $table->foreign('blog_id')->references('id')->on('blogs');
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
    Schema::table('follows', function(Blueprint $table) {
      $table->dropForeign('follows_blog_id_foreign');
      $table->dropForeign('follows_user_id_foreign');
    });
		Schema::drop('follows');
	}

}
