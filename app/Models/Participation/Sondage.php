<?php

namespace App\Models\Participation;

use App\Models\CustomModel;

class Sondage extends CustomModel
{

    protected $table = 'sondages';
    public $timestamps = true;
    protected $fillable = array('titre', 'slug', 'description','photo' ,'date_publication', 'statut', 'add_by', 'thematique_id');

    public function sondageResultats()
    {
        return $this->hasMany('App\Models\Participation\SondageResultat');
    }

    public function sondageOptions()
    {
        return $this->hasMany('App\Models\Participation\SondageOption');
    }

    public function ajouterPar()
    {
        return $this->belongsTo('App\Models\User', 'add_by');
    }

    public function thematique()
    {
        return $this->belongsTo('App\Models\Participation\Thematique', 'thematique_id');
    }
    public function estPublie(){
        return $this->statut === 1 ? true : false;
    }


}
