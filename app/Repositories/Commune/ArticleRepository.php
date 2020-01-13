<?php

namespace App\Repositories\Commune;

use App\Models\Commune\Article;
use App\Repositories\ResourceRepository;
use App\Utils\Slug;

class ArticleRepository extends ResourceRepository
{
    protected $slug;
    const EST_PUBLIE = 1;
    const EST_NON_PUBLIE = 0;

    public function __construct(Article $article, Slug $slug)
    {
        $this->model = $article;
        $this->slug = $slug;
    }

    public function store(Array $inputs)
    {
        try {
            $inputs['slug'] = $this->slug->createSlug($this->model, $inputs['titre']);
            return $this->model->create($inputs);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function update($id, Array $inputs)
    {
        $article = $this->getById($id);
        $titre = $inputs['titre'];

        if ($article->titre != $titre) {
            try {
                $inputs['slug'] = $this->slug->createSlug($this->model, $titre);
            } catch (\Exception $e) {
                return false;
            }
        }

        return $article->update($inputs);
    }

    public function publication($article, $estPublie = true)
    {
        $article->est_publie = self::EST_PUBLIE;
        if (!$estPublie)
            $article->est_publie = self::EST_NON_PUBLIE;

        $article->save();
        return true;
    }

}