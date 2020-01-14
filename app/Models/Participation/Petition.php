<?php

namespace App\Models\Participation;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    protected $table = 'petitions';
    public $timestamps = true;
    protected $fillable = array('themematique_id', 'libelle', 'add_by', 'photo', 'fichier', 'date_expiration', 'objectif');

    public function AjouterPar()
    {
        return $this->belongsTo('App\Models\User', 'add_by');
    }
    public function thematique()
    {
        return $this->hasOne('App\Models\Participation\Thematique', 'themematique_id');
    }

}
