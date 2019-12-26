<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediathequesTable extends Migration {

	public function up()
	{
		Schema::create('mediatheques', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('commune_id')->unsigned()->nullable();
			$table->string('type_media', 25);
			$table->string('fichier');
			$table->string('description')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('mediatheques');
	}
}