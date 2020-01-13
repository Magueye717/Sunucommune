<?php

namespace App\Repositories\Commune;

use App\Models\Commune\Article;

class ArticleRepository extends ResourceRepository
{

    public function __construct(Article $article)
    {
        $this->model = $article;
    }

}