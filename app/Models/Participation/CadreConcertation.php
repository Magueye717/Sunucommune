<?php

namespace App\Models\Participation;

use Illuminate\Database\Eloquent\Model;

class CadreConcertation extends Model
{

    protected $table = 'cadre_concertations';
    public $timestamps = true;
    protected $fillable = array( 'nom', 'date_creation', 'fichier','photo', 'statut', 'add_by');

    public function collectivites()
    {
        return $this->belongsToMany('App\Models\Collectivite');
    }

    public function ajouterPar()
    {
        return $this->belongsTo('App\Models\User', 'add_by');
    }
    public function estActive()
    {
        return $this->statut === 1 ? true : false;
    }

}
