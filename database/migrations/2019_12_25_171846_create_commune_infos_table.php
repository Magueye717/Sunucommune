<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommuneInfosTable extends Migration {

	public function up()
	{
		Schema::create('commune_infos', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('commune_id')->unsigned();
			$table->string('maire');
			$table->string('date_creation')->nullable();
			$table->string('superficie')->nullable();
			$table->string('population')->nullable();
			$table->string('delimitation')->nullable();
			$table->mediumText('mot_du_maire')->nullable();
			$table->string('photo_maire')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('commune_infos');
	}
}