<?php

namespace App\Repositories\Commune;

use App\Models\Commune\Article;
use App\Repositories\ResourceRepository;

class ArticleRepository extends ResourceRepository
{
    protected $article;

    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    public function getListeArticle()
    {
        return $this->model->orderBy('created_at');
    }

}
