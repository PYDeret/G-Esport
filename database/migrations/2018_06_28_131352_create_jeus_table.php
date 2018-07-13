<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJeusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jeus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('libelle');
			$table->string('description');
			$table->string('slug');
			$table->text('img', 65535)->nullable();
			$table->integer('TypeJeuId')->unsigned()->index('TypeJeuId');
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
		Schema::drop('jeus');
	}

}
