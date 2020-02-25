<?php

namespace App\Repositories\Commune;

use App\Models\Commune\Mediatheque;
use App\Repositories\ResourceRepository;

class MediathequeRepository extends ResourceRepository
{
    const EST_PUBLIE = 1;
    const EST_NON_PUBLIE = 0;

    public function __construct(Mediatheque $mediatheque)
    {
        $this->model = $mediatheque;
    }


    public function publication($mediatheque, $estPublie = true)
    {
        $mediatheque->est_publie = self::EST_PUBLIE;
        if (!$estPublie)
            $mediatheque->est_publie = self::EST_NON_PUBLIE;

        $mediatheque->save();
        return true;
    }

}
