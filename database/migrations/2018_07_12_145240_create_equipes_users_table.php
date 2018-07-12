<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquipesUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipes_users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('equipe_id')->unsigned()->index('equipe_id');
			$table->integer('user_id')->unsigned()->index('user_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('equipes_users');
	}

}
