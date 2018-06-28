<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStatistiquesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('statistiques', function(Blueprint $table)
		{
			$table->foreign('id_user', 'FK_statistiques_user')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('statistiques', function(Blueprint $table)
		{
			$table->dropForeign('FK_statistiques_user');
		});
	}

}
