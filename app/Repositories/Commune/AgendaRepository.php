<?php

namespace App\Repositories\Commune;

use App\Models\Commune\Agenda;
use App\Models\Commune\Mediatheque;
use App\Repositories\ResourceRepository;

class AgendaRepository extends ResourceRepository
{

    protected $slug;
    const EST_PUBLIE = 1;
    const EST_NON_PUBLIE = 0;

   
    public function __construct(Agenda $agenda)
    {
        $this->model = $agenda;
    }

    public function publication($agenda, $estPublie = true)
    {
        $agenda->est_publie = self::EST_PUBLIE;
        if (!$estPublie)
            $agenda->est_publie = self::EST_NON_PUBLIE;

        $agenda->save();
        return true;
    }


}
