<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecteursTable extends Migration {

	public function up()
	{
		Schema::create('secteurs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom');
			$table->string('nom_court', 15)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('secteurs');
	}
}