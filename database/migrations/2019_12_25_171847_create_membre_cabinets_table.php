<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembreCabinetsTable extends Migration {

	public function up()
	{
		Schema::create('membre_cabinets', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom');
			$table->string('prenom');
			$table->string('fonction');
			$table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->string('photo')->nullable();
			$table->integer('equipe_municipale_id')->unsigned();
			$table->boolean('statut')->default(1);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('membre_cabinets');
	}
}
