<?php

namespace App\Repositories\Commune;

use App\Models\Commune\Partenaire;
use App\Repositories\ResourceRepository;

class PartenaireRepository extends ResourceRepository
{

    public function __construct(Partenaire $partenaire)
    {
        $this->model = $partenaire;
    }

    public function getListe()
    {
        return $this->model->orderBy('nom')->pluck('nom', 'id');
    }
}
