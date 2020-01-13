<?php

use App\Models\Commune\TypeArticle;
use Illuminate\Database\Seeder;

class TypeArticleTableSeeder extends Seeder
{

    public function run()
    {
        TypeArticle::create(array(
            'libelle' => 'Actualité',
            'description' => ''
        ));

        TypeArticle::create(array(
            'libelle' => 'Délibération',
            'description' => 'Délibérations de la commune'
        ));

        TypeArticle::create(array(
            'libelle' => 'Projet',
            'description' => 'Projets de la commune'
        ));

    }
}