<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInboxsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inboxs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('owner_id');
			$table->integer('send_id');
			$table->text('context');
			$table->boolean('unread')->default(true);
			$table->nullabletimestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inboxs');
	}

}
