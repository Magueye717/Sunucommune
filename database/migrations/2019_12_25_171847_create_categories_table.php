<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom');
			$table->string('description')->nullable();
			$table->string('slug', 50)->unique();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}