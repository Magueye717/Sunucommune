<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCadreConcertationsTable extends Migration {

	public function up()
	{
		Schema::create('cadre_concertations', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('commune_id')->unsigned();
			$table->integer('collectivite_id')->unsigned();
			$table->string('nom');
			$table->date('date_creation')->nullable();
			$table->string('fichier');
			$table->timestamps();
			$table->integer('add_by')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('cadre_concertations');
	}
}