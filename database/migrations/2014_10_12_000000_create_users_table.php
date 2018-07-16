<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('role_id')->unsigned()->nullable()->index('users_role_id_foreign');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('avatar')->nullable()->default('users/default.png');
			$table->string('password');
			$table->string('remember_token', 100)->nullable();
			$table->text('settings', 65535)->nullable();
			$table->text('about', 65535)->nullable();
			$table->string('doubleAuth')->nullable();
			$table->string('numTel')->nullable();
			$table->string('doubleToken')->nullable();
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
		Schema::drop('users');
	}

}
