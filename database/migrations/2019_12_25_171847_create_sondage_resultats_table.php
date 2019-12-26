<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSondageResultatsTable extends Migration {

	public function up()
	{
		Schema::create('sondage_resultats', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('sondage_id')->unsigned();
			$table->bigInteger('sondage_option_id')->unsigned();
			$table->string('adresse_ip')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sondage_resultats');
	}
}