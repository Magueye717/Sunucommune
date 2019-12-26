<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRessourcesTable extends Migration {

	public function up()
	{
		Schema::create('ressources', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('commune_id')->unsigned();
			$table->integer('secteur_id')->unsigned();
			$table->string('nom');
			$table->string('description')->nullable();
			$table->string('heure_ouverture', 50)->nullable();
			$table->string('heure_fermeture', 50)->nullable();
			$table->string('photo')->nullable();
			$table->string('longitude')->nullable();
			$table->string('latittude')->nullable();
			$table->string('altitude')->nullable();
			$table->string('adresse')->nullable();
			$table->string('personne_contact')->nullable();
			$table->string('email')->nullable();
			$table->string('telephone')->nullable();
			$table->boolean('statut')->default(1);
			$table->integer('add_by')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ressources');
	}
}