<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Participation\PanelCommentaire;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(PanelCommentaire::class, function (Faker $faker) {
    return [
        'panel_id' => $faker->name,
        'commentaire' => $faker->commentaire,
        'nom' => $faker->nom,
        'email'  => $faker->email,
        'statut'  => $faker->statut,

    ];
});

/* $factory->define(App\Moldels\Participation\PanelCommentaire::class, function (Faker\Generator $faker) {
    return [
        'panel_id' => $faker->name,
        'commentaire' => $faker->commentaire,
        'nom' => $faker->nom,
        'email'  => $faker->email,
        'statut'  => $faker->statut,

    ];
});
 */

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'comment' => $faker->sentence,
         // Any other Fields in your Comments Model
    ];
});
