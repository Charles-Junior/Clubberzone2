<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUtilisateursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Utilisateurs', function(Blueprint $table) {
			$table->increments('id');
			$table->int('idUtilisateurs');
			$table->varchar('uEmail');
			$table->varchar('uLogin');
			$table->varchar('uPassword');
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
		Schema::drop('Utilisateurs');
	}

}
