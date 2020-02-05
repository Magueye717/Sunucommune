<?php

use App\Models\Commune\EquipeMunicipale;
use Illuminate\Database\Seeder;

class EquipeMunicipaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EquipeMunicipale::create(array(
            'libelle' => 'Cabinet du maire',
            'description' => 'Délibérations de la commune'
        ));

        EquipeMunicipale::create(array(
            'libelle' => 'Secretariat municipale',
            'description' => 'Délibérations de la commune'
        ));

        EquipeMunicipale::create(array(
            'libelle' => 'Conseil Municipal',
            'description' => 'Projets de la commune'
        ));

    }
}
