<?php

namespace App\Repositories\Commune;

use App\Models\Commune\TypeArticle;
use App\Repositories\ResourceRepository;

class TypeArticleRepository extends ResourceRepository
{
    protected $typeArticle;

    public function __construct(TypeArticle $typeArticle)
    {
        $this->model = $typeArticle;
    }

    public function getListeTypArticle()
    {
        return $this->model->orderBy('libelle')->pluck('libelle', 'id')->prepend('Choisir un type article');
    }

}
