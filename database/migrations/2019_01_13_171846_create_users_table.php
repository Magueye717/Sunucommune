<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('statut')->default(1);
            $table->string('adresse')->nullable();
            $table->integer('commune_id')->unsigned()->nullable();
            $table->rememberToken('rememberToken');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}
