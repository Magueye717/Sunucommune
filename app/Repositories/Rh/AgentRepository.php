<?php

namespace App\Repositories\Rh;

use App\Models\Participation\CadreConcertation;
use App\Models\Rh\Agent;
use App\Repositories\ResourceRepository;

class AgentRepository extends ResourceRepository
{

    public function __construct(Agent $agent)
    {
        $this->model = $agent;
    }

    public function getListeCadreConcertation()
    {
        return $this->model->orderBy('nom')->pluck('nom', 'id');
    }

}
