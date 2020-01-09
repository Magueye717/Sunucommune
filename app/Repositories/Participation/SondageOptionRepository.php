<?php

namespace App\Repositories\Participation;

use App\Models\Participation\SondageOption;
use App\Repositories\ResourceRepository;
use Illuminate\Support\Facades\DB;

class SondageOptionRepository extends ResourceRepository
{

    public function __construct(SondageOption $sondageOption)
    {
        $this->model = $sondageOption;
    }


    public function saveMany($options, $sondage)
    {
        $options = explode(",", $options);
        foreach ($options as $option) {
            $optionSondage['libelle'] = $option;
            $optionSondage['sondage_id'] = $sondage;

            $this->store($optionSondage);
        }

    }

    public function updateMany($libelle, $ids, $sondage)
    {

        $ids = rtrim($ids, ",");
        $ids = explode(",", $ids);
        $libelle = explode(",", $libelle);

        $compteur = max(count($libelle), count($ids));


        for ($i = 0; $i < $compteur; $i++) {

            if (isset($ids[$i]) && isset($libelle[$i])&& $ids[0]!="") {

                $optionSondage['libelle'] = $libelle[$i];
                $optionSondage['sondage_id'] = $sondage;
                $this->update($ids[$i], $optionSondage);
            } elseif (isset($libelle[$i])) {

                $optionSondage['libelle'] = $libelle[$i];
                $optionSondage['sondage_id'] = $sondage;
                $this->store($optionSondage);
            } else

                $this->destroy($ids[$i]);


        }
    }



}
