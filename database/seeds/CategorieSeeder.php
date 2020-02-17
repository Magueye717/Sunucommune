<?php

use App\Models\GestionProcedure\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create(array(
            'nom' => 'Etat Civil',
            'description' => 'Les procedures administratives concernant Etat civil',
            'slug' => 'procedures_administratives_Etat_civil'
        ));

        Categorie::create(array(
            'nom' => 'Foncier',
            'description' => 'Les procedures administratives concernant les titres fonciers',
            'slug' => 'procedures_administratives_titre_foncier'
        ));

        Categorie::create(array(
            'nom' => 'Fiscalite',
            'description' => 'Les procedures administratives concernant La fiscalite',
            'slug' => 'procedures_administratives_fiscalite'
        ));

        Categorie::create(array(
            'nom' => 'Social',
            'description' => 'Les procedures administratives concernant le social',
            'slug' => 'procedures_administratives_social'
        ));

    }
}
