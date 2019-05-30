<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blogs', function(Blueprint $table) {
		$table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->string('name');
      $table->text('config');
      $table->string('domain');
			$table->timestamps();
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
		Schema::table('blogs', function(Blueprint $table) {
      $table->dropForeign('blogs_user_id_foreign');
    });
    Schema::drop('blogs');
	}

}
