<?php

namespace App\Models\Participation;

use Illuminate\Database\Eloquent\Model;

class SondageResultat extends Model 
{

    protected $table = 'sondage_resultats';
    public $timestamps = true;
    protected $fillable = array('sondage_id', 'sondage_option_id', 'adresse_ip');

    public function sondage()
    {
        return $this->belongsTo('App\Models\Participation\Sondage');
    }

    public function sondageOption()
    {
        return $this->belongsTo('App\Models\Participation\SondageOption');
    }

}