<?php

namespace App\Repositories\Participation;

use App\Models\Participation\CadreConcertation;
use App\Repositories\ResourceRepository;

class CadreConcertationRepository extends ResourceRepository
{

    public function __construct(CadreConcertation $cadreConcertation)
    {
        $this->model = $cadreConcertation;
    }

}
