<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSondagesTable extends Migration {

	public function up()
	{
		Schema::create('sondages', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('commune_id')->unsigned();
			$table->string('titre');
			$table->string('slug')->unique();
			$table->string('description')->nullable();
			$table->date('date_publication')->nullable();
			$table->boolean('statut')->default(1);
			$table->integer('add_by')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sondages');
	}
}