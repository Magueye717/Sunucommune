<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParteneairesTable extends Migration {

	public function up()
	{
		Schema::create('parteneaires', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom');
			$table->string('type_partenaire', 25)->nullable();
			$table->string('logo')->nullable();
			$table->string('url')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('parteneaires');
	}
}