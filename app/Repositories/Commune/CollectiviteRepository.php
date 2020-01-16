<?php

namespace App\Repositories\Commune;

use App\Models\Collectivite;
use App\Repositories\ResourceRepository;

class CollectiviteRepository extends ResourceRepository
{
    const REGION = 'REGION';

    public function __construct(Collectivite $collectivite)
    {
        $this->model = $collectivite;
    }


    public function getListeCollectivite()
    {
        return $this->model->orderBy('nom')->where('type_collectivite', self::REGION)->pluck('nom', 'id');
    }

    public function getListeByParentCode($codeParent, $type = false)
    {
        return $this->model->orderBy('nom')->byCodeParent($codeParent)->byType($type)->pluck('nom', 'id');
    }
    public function getCodeById($id)
    {
        return $this->getById($id)->code;
    }
    public function getCollectiviteId()
    {
        return $this->model->orderBy('nom')->pluck('nom', 'id');
    }

}
