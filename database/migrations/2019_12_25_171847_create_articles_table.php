<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration {

	public function up()
	{
		Schema::create('articles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('slug')->nullable();
			$table->string('titre');
			$table->mediumText('texte')->nullable();
			$table->string('photo')->nullable();
			$table->integer('type_article_id')->unsigned()->nullable();
			$table->string('piece_jointe')->nullable();
			$table->boolean('est_publie')->default(0);
			$table->integer('add_by')->unsigned()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('articles');
	}
}