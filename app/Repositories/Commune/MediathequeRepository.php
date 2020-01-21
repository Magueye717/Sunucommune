<?php

namespace App\Repositories\Commune;

use App\Models\Commune\Mediatheque;
use App\Repositories\ResourceRepository;

class MediathequeRepository extends ResourceRepository
{

    public function __construct(Mediatheque $mediatheque)
    {
        $this->model = $mediatheque;
    }

}
