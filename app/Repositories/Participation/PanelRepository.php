<?php

namespace App\Repositories\Participation;

use App\Models\Participation\Panel;
use App\Repositories\ResourceRepository;

class PanelRepository extends ResourceRepository
{
    const EST_ACTIVE = 1;
    const EST_DESACTIVE = 0;
    public function __construct(Panel $panel)
    {
        $this->model = $panel;
    }
    public function getListe()
    {
        return $this->model->orderBy('question')->pluck('question', 'id');
    }
    public function valider($panel, $estActive = true)
    {
        $panel->statut = self::EST_ACTIVE;
        if (!$estActive)
            $panel->statut = self::EST_DESACTIVE;

        $panel->save();
        return true;
    }
}
