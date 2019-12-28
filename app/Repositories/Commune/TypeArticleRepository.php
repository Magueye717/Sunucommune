<?php

namespace App\Repositories\Commune;

use App\Models\Commune\TypeArticle;

class TypeArticleRepository extends ResourceRepository
{

    public function __construct(TypeArticle $typeArticle)
    {
        $this->model = $typeArticle;
    }

}