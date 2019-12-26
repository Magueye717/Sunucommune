<?php

namespace App\Repositories;

use App\Models\Commune\Commune;

class CommuneRepository extends ResourceRepository
{
    protected $commune;

    public function __construct(Commune $commune)
    {
        $this->model = $commune;
        $this->commune = new Commune();
    }

    private function save(Commune $commune, Array $inputs)
    {
        $commune->nom = $inputs['nom'];
        $commune->collectivte_id = $inputs['collectivte_id'];
        $commune->save();
    }

    public function store(Array $inputs)
    {
        $commune = new $this->commune;

        $this->save($commune, $inputs);

        return $commune;
    }

    public function getList()
    {
        return $this->model->orderBy('nom')->get();
    }

    public function update($id, Array $inputs)
    {
        return $this->save($this->getById($id), $inputs);
    }

}
