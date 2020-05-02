<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembreCadresTable extends Migration {

	public function up()
	{
		Schema::create('membre_cadres', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('cadre_de_concertation_id')->unsigned();
			$table->string('nom');
			$table->string('prenom');
			$table->string('adresse')->nullable();
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
			$table->string('telephone')->nullable();
			$table->string('fonction')->nullable();
			$table->boolean('statut')->default(0);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('membre_cadres');
	}
}
