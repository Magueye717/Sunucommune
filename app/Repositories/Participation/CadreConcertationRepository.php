<?php

namespace App\Repositories\Participation;

use App\Models\Participation\CadreConcertation;
use App\Repositories\ResourceRepository;

class CadreConcertationRepository extends ResourceRepository
{
    const EST_ACTIVE = 1;
    const EST_DESACTIVE = 0;
    public function __construct(CadreConcertation $cadreConcertation)
    {
        $this->model = $cadreConcertation;
    }

    public function getListeCadreConcertation()
    {
        return $this->model->orderBy('nom')->pluck('nom', 'id');
    }

    public function valider($cadre, $estActive = true)
    {
        $cadre->statut = self::EST_ACTIVE;
        if (!$estActive)
            $cadre->statut = self::EST_DESACTIVE;

        $cadre->save();
        return true;
    }

}
