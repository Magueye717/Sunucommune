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


    public function saveMany($options,$sondage)
    {
        $options=explode(",",$options);
        foreach ($options as $option)
        {
            $optionSondage['libelle']=$option;
            $optionSondage['sondage_id']=$sondage;

            $this->store($optionSondage);
        }

    }

    public function optionBySondage($sondage){

        return   $options = DB::table('sondage_options')
            ->where('sondage_id', $sondage)
            ->get();


    }

}
