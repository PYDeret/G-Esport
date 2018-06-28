<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToResultatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('resultats', function(Blueprint $table)
		{
			$table->foreign('id_recompense', 'FK_resultats_recompenses')->references('id')->on('recompenses')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('resultats', function(Blueprint $table)
		{
			$table->dropForeign('FK_resultats_recompenses');
		});
	}

}
