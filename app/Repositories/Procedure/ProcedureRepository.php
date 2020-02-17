<?php

namespace App\Repositories\Procedure;

use App\Models\GestionProcedure\Procedure;
use App\Repositories\ResourceRepository;

class ProcedureRepository extends ResourceRepository
{
    const EST_ACTIVE = 1;
    const EST_DESACTIVE = 0;
    public function __construct(Procedure $procedure)
    {
        $this->model = $procedure;
    }
    public function getListe()
    {
        return $this->model->orderBy('titre')->pluck('titre', 'id');
    }
    public function valider($procedure, $estActive = true)
    {
        $procedure->statut = self::EST_ACTIVE;
        if (!$estActive)
            $procedure->statut = self::EST_DESACTIVE;

        $procedure->save();
        return true;
    }
}
