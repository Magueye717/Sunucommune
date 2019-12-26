<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParteneairesTable extends Migration {

	public function up()
	{
		Schema::create('parteneaires', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('commune_id')->unsigned()->nullable();
			$table->string('nom');
			$table->string('type_partenaire', 25)->nullable();
			$table->string('logo')->nullable();
			$table->string('url');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('parteneaires');
	}
}