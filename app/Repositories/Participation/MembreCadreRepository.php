<?php

namespace App\Repositories\Participation;

use App\Models\Participation\MembreCadre;
use App\Repositories\ResourceRepository;

class MembreCadreRepository extends ResourceRepository
{

    public function __construct(MembreCadre $membreCadre)
    {
        $this->model = $membreCadre;
    }

}