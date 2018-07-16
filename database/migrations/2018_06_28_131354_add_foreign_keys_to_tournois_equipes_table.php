<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTournoisEquipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tournois_equipes', function(Blueprint $table)
		{
			$table->foreign('TournoiId', 'FK_tournois_equipes')->references('id')->on('tournois')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('EquipeId', 'FK_tournois_equipes_equipe')->references('id')->on('equipes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('EtapeId', 'FK_tournois_equipes_etape')->references('id')->on('etape')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tournois_equipes', function(Blueprint $table)
		{
			$table->dropForeign('FK_tournois_equipes');
			$table->dropForeign('FK_tournois_equipes_equipe');
			$table->dropForeign('FK_tournois_equipes_etape');
		});
	}

}
