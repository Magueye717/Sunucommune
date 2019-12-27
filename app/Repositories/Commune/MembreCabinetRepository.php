<?php

namespace App\Repositories\Commune;

use App\Repositories\ResourceRepository;
use App\Models\Commune\MembreCabinet;
use Illuminate\Support\Facades\DB;

class MembreCabinetRepository extends ResourceRepository
{

    public function __construct(MembreCabinet $membreCabinet)
    {
        $this->model = $membreCabinet;
    }

    public function getListe()
    {
        return $this->model->select(DB::raw("CONCAT(prenom,' ',nom) AS fullname"),'id')->orderBy('fullname')->pluck('fullname', 'id');
    }

    

}