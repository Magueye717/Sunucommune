<?php

namespace App\Repositories\Commune;

use App\Models\Commune\EquipeMunicipale;
use App\Repositories\ResourceRepository;

class EquipeMunicipaleRepository extends ResourceRepository
{

    public function __construct(EquipeMunicipale $equipeMunicipale)
    {
        $this->model = $equipeMunicipale;
    }


    public function getListeEquipeMunicipale()
    {
        return $this->model->orderBy('libelle')->pluck('libelle', 'id');
    }

    public function getEquipeMunicipale()
    {
        return $this->model->orderBy('libelle')->get();
    }
    

}
