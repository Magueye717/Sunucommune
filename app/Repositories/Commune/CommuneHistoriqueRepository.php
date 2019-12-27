<?php

namespace App\Repositories\Commune;

use App\Models\Commune\CommuneHistorique;

class CommuneHistoriqueRepository extends ResourceRepository
{

    public function __construct(CommuneHistorique $communeHistorique)
    {
        $this->model = $communeHistorique;
    }

}