<?php

use App\Models\GestionInfrastructure\Secteur;
use Illuminate\Database\Seeder;

class SecteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Secteur::create(array(
            'nom' => 'Education',
            'nom_court' => 'edu'
        ));

        Secteur::create(array(
            'nom' => 'Culture',
            'nom_court' => 'clt'
        ));

        Secteur::create(array(
            'nom' => 'Connerce',
            'nom_court' => 'com'
        ));

        Secteur::create(array(
            'nom' => 'Santé',
            'nom_court' => 'sn'
        ));
        Secteur::create(array(
            'nom' => 'Sport',
            'nom_court' => 'port'
        ));
        Secteur::create(array(
            'nom' => 'Autre',
            'nom_court' => 'autre'
        ));
    }
}
