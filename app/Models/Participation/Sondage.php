<?php

namespace App\Models\Participation;

use App\Models\CustomModel;

class Sondage extends CustomModel
{

    protected $table = 'sondages';
    public $timestamps = true;
    protected $fillable = array('titre', 'slug', 'description', 'date_publication', 'statut', 'add_by', 'thematique_id');

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

    public function thematiques()
    {
        return $this->hasMany('App\Models\Participation\Thematique', 'thematique_id');
    }


}
