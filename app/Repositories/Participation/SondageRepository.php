<?php

namespace App\Repositories\Participation;

use App\Models\Participation\Sondage;
use App\Repositories\ResourceRepository;
use App\Utils\Slug;


class SondageRepository extends ResourceRepository
{
    protected $slug;
    const EST_PUBLIE = 1;
    const EST_NON_PUBLIE = 0;

    public function __construct(Sondage $sondage, Slug $slug)
    {
        $this->model = $sondage;
        $this->slug = $slug;

    }


    public function getListe()
    {
        return $this->model->orderBy('titre')->pluck('titre', 'id');
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

    public function publication($sondage, $estPublie = true)
    {
        $sondage->statut = self::EST_PUBLIE;
        if (!$estPublie)
            $sondage->statut = self::EST_NON_PUBLIE;

        $sondage->save();
        return true;
    }


}
