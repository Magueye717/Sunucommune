<?php

namespace App\Repositories\Participation;

use App\Models\Participation\MembreCadre;
use App\Repositories\ResourceRepository;

class MembreCadreRepository extends ResourceRepository
{
    const EST_ACTIVE = 1;
    const EST_DESACTIVE = 0;
    public function __construct(MembreCadre $membreCadre)
    {
        $this->model = $membreCadre;
    }

    public function valider($membre, $estActive = true)
    {
        $membre->statut = self::EST_ACTIVE;
        if (!$estActive)
            $membre->statut = self::EST_DESACTIVE;

        $membre->save();
        return true;
    }
}
