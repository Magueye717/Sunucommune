<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model 
{

    protected $table = 'communes';
    public $timestamps = true;
    protected $fillable = array('nom', 'collectivte_id', 'statut');

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Commune\Article');
    }

    public function communeInfo()
    {
        return $this->hasOne('App\Models\Commune\CommuneInfo');
    }

    public function partenaires()
    {
        return $this->hasMany('App\Models\Commune\Partenaire');
    }

    public function membreCabinets()
    {
        return $this->hasMany('App\Models\Commune\MembreCabinet');
    }

    public function mediatheques()
    {
        return $this->hasMany('App\Models\Commune\Mediatheques');
    }

    public function communeHistorique()
    {
        return $this->hasOne('App\Models\Commune\CommuneHistorique');
    }

    public function procedures()
    {
        return $this->hasMany('App\Models\GestionProcedure\Procedure');
    }

    public function ressources()
    {
        return $this->hasMany('App\Models\GestionInfrastructure\Ressource');
    }

    public function agents()
    {
        return $this->hasMany('App\Models\Rh\Agent');
    }

    public function cadreConcertations()
    {
        return $this->hasMany('App\Models\Participation\CadreConcertation');
    }

    public function sondages()
    {
        return $this->hasMany('App\Models\Participation\Sondage');
    }

    public function panels()
    {
        return $this->hasMany('App\Models\Participation\Panel');
    }

}