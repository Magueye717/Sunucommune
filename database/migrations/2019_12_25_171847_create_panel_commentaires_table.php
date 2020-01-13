<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePanelCommentairesTable extends Migration {

	public function up()
	{
		Schema::create('panel_commentaires', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('panel_id')->unsigned();
			$table->string('commentaire');
			$table->string('nom');
			$table->string('email');
			$table->boolean('statut')->default(1);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('panel_commentaires');
	}
}