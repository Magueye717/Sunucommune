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

    public function setHistorique($communeInfo, $historique)
    {
        $communeInfo->historique = $historique;
        $communeInfo->save();
        return true;
    }

    public function getCommune()
    {
        return $this->model->orderBy('nom')->pluck('nom', 'id');
    }
    public function getCollectiviteId()
    {
        return $this->model->pluck('collectivite_id')->first();

    }
}
