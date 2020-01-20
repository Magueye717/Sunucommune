<?php

namespace App\Repositories\Participation;

use App\Models\Participation\PanelCommentaire;
use App\Repositories\ResourceRepository;

class PanelCommentaireRepository extends ResourceRepository
{
    const EST_ACTIVE = 1;
    const EST_DESACTIVE = 0;
    public function __construct(PanelCommentaire $panelCommentaire)
    {
        $this->model = $panelCommentaire;
    }
    public function getListe()
    {
        return $this->model->orderBy('commentaire')->pluck('commentaire', 'id');
    }
    public function valider($panelCommentaire, $estActive = true)
    {
        $panelCommentaire->statut = self::EST_ACTIVE;
        if (!$estActive)
            $panelCommentaire->statut = self::EST_DESACTIVE;

        $panelCommentaire->save();
        return true;
    }

}
