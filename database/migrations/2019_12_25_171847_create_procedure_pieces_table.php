<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcedurePiecesTable extends Migration {

	public function up()
	{
		Schema::create('procedure_pieces', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom');
			$table->string('description')->nullable();
			$table->string('extension')->nullable();
			$table->timestamps();
			$table->integer('procedure_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('procedure_pieces');
	}
}