<?php

namespace App\Repositories\Commune;

use App\Models\Commune\Partenaire;

class PartenaireRepository extends ResourceRepository
{

    public function __construct(Partenaire $partenaire)
    {
        $this->model = $partenaire;
    }

}