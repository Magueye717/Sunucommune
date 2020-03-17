<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemebreCadreSocialLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membre_cadre_social_link', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('membre_cadre_id')->unsigned();
            $table->integer('social_link_id')->unsigned();
            $table->foreign('membre_cadre_id')->references('id')->on('membre_cadres')
                     ->onDelete('cascade');
            $table->foreign('social_link_id')->references('id')->on('social_links')
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
        Schema::dropIfExists('memebre_cadre_social_link');
    }
}
