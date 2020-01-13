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

}