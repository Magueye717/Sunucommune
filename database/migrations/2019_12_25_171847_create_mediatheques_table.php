<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediathequesTable extends Migration {

	public function up()
	{
		Schema::create('mediatheques', function(Blueprint $table) {
			$table->increments('id');
			$table->string('type_media', 5);
			$table->string('fichier');
			$table->string('rubrique');
			$table->string('description', 300)->nullable();
			$table->boolean('est_publie')->default(0);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('mediatheques');
	}
}