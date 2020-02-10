<?php

namespace App\Repositories\Commune;

use App\Models\Commune\AncienMaire;
use App\Repositories\ResourceRepository;

class AncienMaireRepository extends ResourceRepository
{

    public function __construct(AncienMaire $ancienMaire)
    {
        $this->model = $ancienMaire;
    }

}
