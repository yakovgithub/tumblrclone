<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table) {
			$table->increments('id');
      $table->integer('sender_id')->unsigned();
      $table->integer('receiver_id')->unsigned();
      $table->text('message');
      $table->foreign('sender_id')->references('id')->on('blogs');
      $table->foreign('receiver_id')->references('id')->on('blogs');
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
    Schema::table('messages', function(Blueprint $table) {
      $table->dropForeign('messages_sender_id_foreign');
      $table->dropForeign('messages_receiver_id_foreign');
    });
		Schema::drop('messages');
	}

}
