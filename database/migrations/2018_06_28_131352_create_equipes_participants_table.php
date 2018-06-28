<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquipesParticipantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipes_participants', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_equipe')->unsigned()->index('id_equipe');
			$table->integer('id_participant')->unsigned()->index('id_participant');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('equipes_participants');
	}

}
