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
			$table->foreign('JeuId', 'FK_JeuId')->references('id')->on('jeus')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ResultatId', 'FK_ResultatId')->references('id')->on('resultats')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
			$table->dropForeign('FK_JeuId');
			$table->dropForeign('FK_ResultatId');
		});
	}

}
