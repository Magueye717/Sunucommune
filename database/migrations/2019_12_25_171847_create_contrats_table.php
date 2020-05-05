<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContratsTable extends Migration {

	public function up()
	{
		Schema::create('contrats', function(Blueprint $table) {
			$table->increments('id');
			$table->date('date_debut');
			$table->string('nom');
			$table->date('date_fin');
			$table->string('statut');
			$table->boolean('conge')->default(0);
			$table->integer('agent_id')->unsigned()->nullable();
			$table->foreign('agent_id')->references('id')->on('agents')
                     ->onDelete('cascade');
			$table->string('type_contrat', 15);
		});
	}

	public function down()
	{
		Schema::drop('contrats');
	}
}