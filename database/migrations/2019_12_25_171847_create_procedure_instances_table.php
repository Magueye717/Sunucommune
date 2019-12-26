<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcedureInstancesTable extends Migration {

	public function up()
	{
		Schema::create('procedure_instances', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('procedure_id')->unsigned();
			$table->bigInteger('procedure_usager_id')->unsigned();
			$table->string('numero_depot', 50);
			$table->string('date_depot');
			$table->date('date_retrait')->nullable();
			$table->string('code_etat', 30);
			$table->integer('add_by')->unsigned()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('procedure_instances');
	}
}