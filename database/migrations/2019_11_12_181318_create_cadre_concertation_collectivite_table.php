<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadreConcertationCollectiviteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadre_concertation_collectivite', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cadre_concertation_id')->unsigned();
            $table->boolean('statut')->default(0);
            $table->integer('collectivite_id')->unsigned();
            $table->foreign('cadre_concertation_id')->references('id')->on('cadre_concertations')
                     ->onDelete('cascade');
            $table->foreign('collectivite_id')->references('id')->on('collectivites')
                     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cadre_concertation_collectivite');
    }
}
