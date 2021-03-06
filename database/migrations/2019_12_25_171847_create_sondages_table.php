<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSondagesTable extends Migration {

	public function up()
	{
		Schema::create('sondages', function(Blueprint $table) {
			$table->increments('id');
			$table->string('titre');
			$table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->string('fichier')->nullable();
            $table->date('date_publication')->nullable();
            $table->integer('thematique_id')->unsigned();
			$table->boolean('statut')->default(0);
			$table->integer('add_by')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sondages');
	}
}
