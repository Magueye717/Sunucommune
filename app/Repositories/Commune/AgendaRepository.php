<?php

namespace App\Repositories\Commune;

use App\Models\Commune\Agenda;
use App\Models\Commune\Mediatheque;
use App\Repositories\ResourceRepository;

class AgendaRepository extends ResourceRepository
{
   
    public function __construct(Agenda $agenda)
    {
        $this->model = $agenda;
    }


}
