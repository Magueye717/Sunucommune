<?php

namespace App\Repositories\Participation;

use App\Models\Participation\Thematique;
use App\Repositories\ResourceRepository;

class ThematiqueRepository extends ResourceRepository
{

    public function __construct(Thematique $thematique)
    {
        $this->model = $thematique;
    }
    public function getListe()
    {
        return $this->model->orderBy('libelle')->pluck('libelle', 'id');
    }
    public function getListeThematiques()
    {
        return $this->model->orderBy('libelle')->pluck('libelle', 'id');
    }

}
