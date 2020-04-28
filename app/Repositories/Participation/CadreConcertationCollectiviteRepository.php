<?php

namespace App\Repositories\Participation;

use App\Models\Participation\CadreConcertationCollectivite;
use App\Repositories\ResourceRepository;

class CadreConcertationCollectiviteRepository extends ResourceRepository
{

    public function __construct(CadreConcertationCollectivite $cadreConcertationCollectivite)
    {
        $this->model = $cadreConcertationCollectivite;
    }

    public function getListeCadreConcertationCollectivites()
    {
        return $this->model->orderBy('nom')->pluck('nom', 'id');
    }
    public function saveMany($collectivites, $cadre)
    {

       // dd($collectivites);
      //  $collectivites = explode(",", $collectivites);
        foreach ($collectivites as $option) {
            $cadreConcertationCollectivite['collectivite_id'] = $option;
            $cadreConcertationCollectivite['cadre_concertation_id'] = $cadre;

            $this->store($cadreConcertationCollectivite);
        }

    }
}
