<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgentsTable extends Migration {

	public function up()
	{
		Schema::create('agents', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('commune_id')->unsigned();
			$table->string('nom');
			$table->string('prenom');
			$table->string('fonction');
			$table->string('statut_agent', 30)->nullable();
			$table->string('adresse')->nullable();
			$table->string('email')->nullable();
			$table->string('telephone')->nullable();
			$table->string('avatar')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('agents');
	}
}