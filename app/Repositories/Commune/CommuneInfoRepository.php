<?php

namespace App\Repositories\Commune;

use App\Models\Commune\CommuneInfo;
use App\Repositories\ResourceRepository;

class CommuneInfoRepository extends ResourceRepository
{

    public function __construct(CommuneInfo $communeInfo)
    {
        $this->model = $communeInfo;
    }

    public function getInfo()
    {
        return $this->model->latest()->first();
    }

}