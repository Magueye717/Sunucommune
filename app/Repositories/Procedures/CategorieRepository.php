<?php

namespace App\Repositories\Procedures;

use App\Models\Procedu\Categorie;
use App\Repositories\ResourceRepository;

class CategorieRepository extends ResourceRepository
{

    public function __construct(Categorie $Categorie)
    {
        $this->model = $Categorie;
    }
    public function getListe()
    {
        return $this->model->orderBy('nom')->pluck('nom', 'id');
    }

}
