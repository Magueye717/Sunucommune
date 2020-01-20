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

    public function getListe()
    {
        return $this->model->orderBy('libelle')->pluck('libelle', 'id');
    }

}