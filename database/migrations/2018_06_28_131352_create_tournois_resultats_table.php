<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTournoisResultatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tournois_resultats', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_tournois')->index('id_tournois');
			$table->integer('id_resultats')->index('id_resultats');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tournois_resultats');
	}

}
