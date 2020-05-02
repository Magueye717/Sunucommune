<?php

namespace App\Models\Participation;

use Illuminate\Database\Eloquent\Model;

class MembreCadre extends Model
{

    protected $table = 'membre_cadres';
    public $timestamps = true;
    protected $fillable = array('nom', 'prenom', 'adresse', 'email', 'telephone', 'fonction','photo', 'statut_cadre', 'cadre_de_concertation_id');

    public function cadreConcertation()
    {
        return $this->belongsTo('App\Models\Participation\CadreConcertation', 'cadre_de_concertation_id');
    }

    public function estActive()
    {
        return $this->statut === 1 ? true : false;
    }

   /*  public function reseauxSociaux()
    {
        return $this->belongsToMany('App\Models\Commune\SocialLink');
    } */

}
