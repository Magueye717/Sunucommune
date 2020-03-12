<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCadreConcertationsTable extends Migration {

	public function up()
	{
		Schema::create('cadre_concertations', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('collectivite_id')->unsigned();
			$table->string('nom');
			$table->date('date_creation')->nullable();
			$table->string('photo')->nullable();
            $table->string('fichier')->nullable();
			$table->timestamps();
			$table->integer('add_by')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('cadre_concertations');
	}
}
