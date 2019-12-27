<?php

namespace App\Repositories\Commune;

use App\Models\Commune\MembreCabinet;

class MembreCabinetRepository extends ResourceRepository
{

    public function __construct(MembreCabinet $membreCabinet)
    {
        $this->model = $membreCabinet;
    }

}