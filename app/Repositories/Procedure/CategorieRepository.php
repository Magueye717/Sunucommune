<?php

namespace App\Repositories\Procedure;

use App\Models\GestionProcedure\Categorie;
use App\Repositories\ResourceRepository;
use App\Utils\Slug;

class CategorieRepository extends ResourceRepository
{
    protected $slug;
    public function __construct(Categorie $Categorie, Slug $slug)
    {
        $this->model = $Categorie;
        $this->slug = $slug;
    }
    public function getListe()
    {
        return $this->model->orderBy('nom')->pluck('nom', 'id');
    }

    public function store(Array $inputs)
    {
        try {
            $inputs['slug'] = $this->slug->createSlug($this->model, $inputs['nom']);

            return $this->model->create($inputs);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function updatec($id, Array $inputs)
    {
        $article = $this->getById($id);
        $nom = $inputs['nom'];

        if ($article->nom != $nom) {
            try {
                $inputs['slug'] = $this->slug->createSlug($this->model, $nom);
            } catch (\Exception $e) {
                return false;
            }
        }
    }
}
