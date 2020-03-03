<?php

namespace App\Repositories\Infrastructures;

use App\Models\GestionInfrastructure\Ressource;
use App\Repositories\ResourceRepository;

class RessourceRepository extends ResourceRepository
{
   
    public function __construct(Ressource $ressource)
    {
        $this->model = $ressource;
    }


}
