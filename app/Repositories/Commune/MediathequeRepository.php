<?php

namespace App\Repositories\Commune;

use App\Models\Commune\Mediatheque;

class MediathequeRepository extends ResourceRepository
{

    public function __construct(Mediatheque $mediatheque)
    {
        $this->model = $mediatheque;
    }

}