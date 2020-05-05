<?php

namespace App\Repositories\Rh;
use App\Models\Rh\Contrat;
use App\Repositories\ResourceRepository;

class ContratRepository extends ResourceRepository
{

    public function __construct(Contrat $contrat)
    {
        $this->model = $contrat;
    }

}
