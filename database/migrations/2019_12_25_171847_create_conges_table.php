<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCongesTable extends Migration {

	public function up()
	{
		Schema::create('conges', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('agent_id')->unsigned();
			$table->string('type_conge', 30);
			$table->date('date_debut');
			$table->date('date_fin');
			$table->date('date_retour_effectif')->nullable();
			$table->string('etat', 30);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('conges');
	}
}