<?php

namespace App\Repositories\Participation;

use App\Models\Participation\SondageOption;
use App\Repositories\ResourceRepository;

class SondageOptionRepository extends ResourceRepository
{

    public function __construct(SondageOption $sondageOption)
    {
        $this->model = $sondageOption;
    }

}