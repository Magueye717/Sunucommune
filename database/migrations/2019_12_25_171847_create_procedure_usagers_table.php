<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcedureUsagersTable extends Migration {

	public function up()
	{
		Schema::create('procedure_usagers', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('nom');
			$table->string('prenom');
			$table->string('adresse')->nullable();
			$table->string('email')->nullable();
			$table->string('telephone')->nullable();
			$table->string('cin', 25)->nullable();
			$table->date('date_naissance')->nullable();
			$table->string('lieu_naissance')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('procedure_usagers');
	}
}