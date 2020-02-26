<?php

namespace App\Repositories\Commune;

use App\Models\Commune\SocialLink;
use App\Repositories\ResourceRepository;

class SocialLinkRepository extends ResourceRepository
{

    public function __construct(SocialLink $reseau)
    {
        $this->model = $reseau;
    }

}