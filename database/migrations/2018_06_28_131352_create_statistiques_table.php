<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatistiquesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('statistiques', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('nbgame')->nullable();
			$table->timestamps();
			$table->integer('id_user')->unsigned()->nullable()->index('FK_statistiques_user');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('statistiques');
	}

}
