<?php

namespace App\Repositories\Participation;

use App\Models\Participation\Panel;
use App\Repositories\ResourceRepository;

class PanelRepository extends ResourceRepository
{

    public function __construct(Panel $panel)
    {
        $this->model = $panel;
    }
    public function getListe()
    {
        return $this->model->orderBy('question')->pluck('question', 'id');
    }

}
