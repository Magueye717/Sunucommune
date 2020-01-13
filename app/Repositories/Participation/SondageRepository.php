<?php

namespace App\Repositories\Participation;

use App\Models\Participation\Sondage;
use App\Repositories\ResourceRepository;

class SondageRepository extends ResourceRepository
{

    public function __construct(Sondage $sondage)
    {
        $this->model = $sondage;
    }



    public function getListe()
    {
        return $this->model->orderBy('titre')->pluck('titre', 'id');
    }

}
