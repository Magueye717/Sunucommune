<?php

namespace App\Repositories\Participation;

use App\Models\Participation\PanelCommentaire;
use App\Repositories\ResourceRepository;

class PanelCommentaireRepository extends ResourceRepository
{

    public function __construct(PanelCommentaire $panelCommentaire)
    {
        $this->model = $panelCommentaire;
    }
    public function getListe()
    {
        return $this->model->orderBy('commentaire')->pluck('commentaire', 'id');
    }

}
