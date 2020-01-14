<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePanelTable extends Migration {

	public function up()
	{
		Schema::create('panel', function(Blueprint $table) {
			$table->increments('id');
            $table->string('question');
            $table->string('description');
            $table->string('photo');
            $table->string('fichier');
            $table->integer('thematique_id')->unsigned();
			$table->date('date_publication')->nullable();
			$table->boolean('statut')->default(1);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('panel');
	}
}
