<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table) {
			$table->increments('id');
      $table->string('name');
      $table->text('content');
      $table->integer('blog_id')->unsigned();
			$table->timestamps();
      $table->foreign('blog_id')->references('id')->on('blogs');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::table('pages', function(Blueprint $table) {
      $table->dropForeign('pages_blog_id_foreign');
    });
		Schema::drop('pages');
	}

}
