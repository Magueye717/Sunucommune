<?php

namespace App\Repositories;

use App\Models\Collectivite;

class CollectiviteRepository extends ResourceRepository
{
    const REGION = 'REGION';
    protected $collectivite;

    public function __construct(Collectivite $collectivite)
    {
        $this->model = $collectivite;
        $this->collectivite = new Collectivite();

    }

    public function getPaginate($n)
    {
        return $this->collectivite->with('collectivite')
            ->orderBy('collectivites.nom', 'desc')
            ->paginate($n);
    }

    public function getListeRegion()
    {
        return $this->model->orderBy('nom')->where('type_collectivite', self::REGION)->pluck('nom', 'id');
    }

    public function getListeByParentCode($codeParent, $type = false)
    {
        return $this->model->orderBy('nom')->byCodeParent($codeParent)->byType($type)->pluck('nom', 'id');
    }

    private function save(Collectivite $collectivite, Array $inputs)
    {
        $collectivite->code = $inputs['code'];
        $collectivite->nom = $inputs['nom'];
        $collectivite->type_collectivite = $inputs['type_collectivite'];
        $collectivite->parent_code = $inputs['parent_code'];
        $collectivite->save();
    }

    public function store(Array $inputs)
    {
        $collectivite = new $this->collectivite;

        $this->save($collectivite, $inputs);

        return $collectivite;
    }

    public function getDepartementByParentCode($codeParent, $type = false)
    {
        return $this->model->byCodeParent($codeParent)->byType($type)->paginate(5);
    }

    public function getCommuneByParentCode($codeParent, $type = false)
    {
        return $this->model->byCodeParent($codeParent)->byType($type)->paginate(5);
    }

    public function getQuartierVillageByParentCode($codeParent, $type = false)
    {
        return $this->model->byCodeParent($codeParent)->byType($type)->paginate(5);
    }

    public function getCollectiviteData($type, $codeParent)
    {
        return $this->model->select('nom as label', 'code')
            ->byCodeParent($codeParent)->byType($type)
            ->orderBy('label')
            ->get();
    }

    public function getCodeById($id)
    {
        return $this->getById($id)->code;
    }
    public function getNomById($id)
    {
        return $this->getById($id)->nom;
    }

    public function getFirstRegion()
    {
        return $this->model->byType(self::REGION)->orderBy('nom')->first();
    }

}
