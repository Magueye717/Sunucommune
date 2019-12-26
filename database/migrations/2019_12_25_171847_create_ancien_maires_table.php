<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAncienMairesTable extends Migration {

	public function up()
	{
		Schema::create('ancien_maires', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('commune_historique_id')->unsigned();
			$table->string('nom');
			$table->string('prenom');
			$table->string('photo')->nullable();
			$table->text('biographie')->nullable();
			$table->date('date_debut_mandat')->nullable();
			$table->date('date_fin_mandat')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ancien_maires');
	}
}