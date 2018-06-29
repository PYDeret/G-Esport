<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParticipantsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('participants_users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_participants')->unsigned()->index('id_participants');
			$table->integer('id_users')->unsigned()->index('id_users');
		});*/
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('participants_users');
	}

}
