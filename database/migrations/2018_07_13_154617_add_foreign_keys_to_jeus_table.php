<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToJeusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jeus', function(Blueprint $table)
		{
			$table->foreign('TypeJeuId', 'FK_jeus_typejeu')->references('id')->on('type_jeus')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('TypeJeuId', 'FK_jeux_type_jeux')->references('id')->on('jeus')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jeus', function(Blueprint $table)
		{
			$table->dropForeign('FK_jeus_typejeu');
			$table->dropForeign('FK_jeux_type_jeux');
		});
	}

}
