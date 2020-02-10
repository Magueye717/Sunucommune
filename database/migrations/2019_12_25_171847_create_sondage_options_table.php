<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSondageOptionsTable extends Migration {

	public function up()
	{
		Schema::create('sondage_options', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('sondage_id')->unsigned();
			$table->string('libelle');
		});
	}

	public function down()
	{
		Schema::drop('sondage_options');
	}
}