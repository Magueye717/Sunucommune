<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContratsTable extends Migration {

	public function up()
	{
		Schema::create('contrats', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom');
			$table->string('type_contrat', 15);
		});
	}

	public function down()
	{
		Schema::drop('contrats');
	}
}