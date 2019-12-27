<?php

namespace App\Repositories\Commune;

use App\Models\Commune\CommuneInfo;

class CommuneInfoRepository extends ResourceRepository
{

    public function __construct(CommuneInfo $communeInfo)
    {
        $this->model = $communeInfo;
    }

}