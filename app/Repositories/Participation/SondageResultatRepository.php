<?php

namespace App\Repositories\Participation;

use App\Models\Participation\SondageResultat;
use App\Repositories\ResourceRepository;

class SondageResultatRepository extends ResourceRepository
{

    public function __construct(SondageResultat $sondageResultat)
    {
        $this->model = $sondageResultat;
    }

}