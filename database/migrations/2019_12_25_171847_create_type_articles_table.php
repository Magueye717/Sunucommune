<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeArticlesTable extends Migration {

	public function up()
	{
		Schema::create('type_articles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('libelle');
			$table->string('description')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('type_articles');
	}
}