<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTournoisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tournois', function(Blueprint $table)
		{
			$table->foreign('ResultatId', 'FK_tournois_resultats')->references('id')->on('resultats')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('JeuId', 'FK_tournois_jeu')->references('id')->on('jeus')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tournois', function(Blueprint $table)
		{
			$table->dropForeign('FK_tournois_resultats');
		});
	}

}
