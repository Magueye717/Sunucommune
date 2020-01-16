<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoriqueContratsTable extends Migration {

	public function up()
	{
		Schema::create('historique_contrat', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('agent_id')->unsigned();
			$table->integer('contrat_id')->unsigned();
			$table->date('date_debut')->nullable();
			$table->integer('date_fin')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('historique_contrat');
	}
}
