<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProceduresTable extends Migration {

	public function up()
	{
		Schema::create('procedures', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('categorie_id')->unsigned();
			$table->string('titre');
			$table->mediumText('description');
			$table->double('couts')->nullable();
			$table->string('lieu_depot')->nullable();
			$table->boolean('statut')->default(1);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('procedures');
	}
}