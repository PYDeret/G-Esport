<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTournoisEquipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tournois_equipes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('TournoiId')->unsigned()->nullable()->index('TournoiId');
			$table->integer('EquipeId')->unsigned()->nullable()->index('EquipeId');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tournois_equipes');
	}

}
