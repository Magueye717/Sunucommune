<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommunesTable extends Migration {

	public function up()
	{
		Schema::create('communes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom');
			$table->string('collectivte_id');
			$table->boolean('statut')->default(1);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('communes');
	}
}