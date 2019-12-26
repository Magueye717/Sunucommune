<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommuneHistoriquesTable extends Migration {

	public function up()
	{
		Schema::create('commune_historiques', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('commune_id')->unsigned();
			$table->mediumText('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('commune_historiques');
	}
}