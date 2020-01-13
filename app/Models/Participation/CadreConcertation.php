<?php

namespace App\Models\Participation;

use Illuminate\Database\Eloquent\Model;

class CadreConcertation extends Model
{

    protected $table = 'cadre_concertations';
    public $timestamps = true;
    protected $fillable = array('collectivite_id', 'nom', 'date_creation', 'fichier', 'add_by');

    public function collectivite()
    {
        return $this->belongsTo('App\Models\Collectivite');
    }

    public function ajouterPar()
    {
        return $this->belongsTo('App\Models\User', 'add_by');
    }

}