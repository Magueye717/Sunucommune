<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePanelTable extends Migration {

	public function up()
	{
		Schema::create('panel', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('thematique_id')->unsigned();
            $table->string('question');
            $table->string('description')->nullable();
            $table->string('photo')->nullable();
            $table->string('fichier')->nullable();
			$table->date('date_publication')->nullable();
			$table->boolean('statut')->default(0);
            $table->integer('priorite')->default(0);
            $table->unsignedInteger('views')->default(0)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('panel');
	}
}
