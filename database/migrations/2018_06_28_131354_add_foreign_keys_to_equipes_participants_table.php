<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEquipesParticipantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::table('equipes_participants', function(Blueprint $table)
		{
			$table->foreign('id_equipe', 'FK_equipes_participants_equipe')->references('id')->on('equipes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_participant', 'FK_equipes_participants_participant')->references('id')->on('participants')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});*/
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('equipes_participants', function(Blueprint $table)
		{
			$table->dropForeign('FK_equipes_participants_equipe');
			$table->dropForeign('FK_equipes_participants_participant');
		});
	}

}
