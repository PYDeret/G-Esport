<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToParticipantsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::table('participants_users', function(Blueprint $table)
		{
			$table->foreign('id_participants', 'FK_participants_users_participants')->references('id')->on('participants')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_users', 'FK_participants_users_users')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});*/
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('participants_users', function(Blueprint $table)
		{
			$table->dropForeign('FK_participants_users_participants');
			$table->dropForeign('FK_participants_users_users');
		});
	}

}
