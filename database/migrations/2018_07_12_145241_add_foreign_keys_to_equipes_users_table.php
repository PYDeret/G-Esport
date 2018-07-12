<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEquipesUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equipes_users', function(Blueprint $table)
		{
			$table->foreign('equipe_id', 'FK_equipe_id')->references('id')->on('equipes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('equipes_users', function(Blueprint $table)
		{
			$table->dropForeign('FK_equipe_id');
			$table->dropForeign('FK_user_id');
		});
	}

}
