<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTournoisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tournois', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('libelle')->nullable();
			$table->string('description')->nullable();
			$table->string('image')->nullable();
			$table->date('DateDebut')->nullable();
			$table->date('DateFin')->nullable();
			$table->time('HeureDebut')->nullable();
			$table->time('HeureFin')->nullable();
			$table->string('slug')->nullable();
			$table->integer('ResultatId')->unsigned()->nullable()->index('FK_tournois_resultats');
			$table->integer('JeuId')->unsigned()->nullable()->index('FK_tournois_jeu');
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
		Schema::drop('tournois');
	}

}
