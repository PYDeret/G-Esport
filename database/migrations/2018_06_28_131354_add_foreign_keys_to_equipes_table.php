<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEquipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equipes', function(Blueprint $table)
		{
			$table->foreign('ParticipantId', 'FK_equipes_participants')->references('id')->on('participants')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('equipes', function(Blueprint $table)
		{
			$table->dropForeign('FK_equipes_participants');
		});
	}

}
