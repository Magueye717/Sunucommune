<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcedureInstancePiecesTable extends Migration {

	public function up()
	{
		Schema::create('procedure_instance_pieces', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('procedure_instance_id')->unsigned();
			$table->bigInteger('procedure_piece_id')->unsigned();
			$table->string('fichier');
			$table->string('extension', 10)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('procedure_instance_pieces');
	}
}