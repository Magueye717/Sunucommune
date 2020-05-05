<?php

namespace App\Models\Rh;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model 
{

    protected $table = 'agents';
    public $timestamps = true;
    protected $fillable = array('commune_id', 'nom', 'prenom', 'fonction', 'statut_agent', 'adresse', 'email', 'telephone', 'avatar');

    public function historiqueContrats()
    {
        return $this->hasMany('App\Models\Rh\HistoriqueContrat');
    }

    public function conges()
    {
        return $this->hasMany('App\Models\Rh\Conge');
    }

    public function contrats()
    {
        return $this->hasMany('App\Models\Rh\Contrat');
    }

}