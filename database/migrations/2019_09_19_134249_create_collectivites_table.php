<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCollectivitesTable extends Migration {

	public function up()
	{
		Schema::create('collectivites', function(Blueprint $table) {
			$table->increments('id');
			$table->string('code', 100)->unique()->nullable();
			$table->string('nom')->nullable();
			$table->string('statut', 30)->default('ACTIVE')->nullable();
			$table->string('type_collectivite', 100)->nullable();
			$table->string('parent_code', 100)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('collectivites');
	}
}