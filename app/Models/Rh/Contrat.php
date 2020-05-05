<?php

namespace App\Models\Rh;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model 
{

    protected $table = 'contrats';
    public $timestamps = false;
    protected $fillable = array('nom', 'type_contrat', 'date_debut', 'date_fin', 'statut', 'conge', 'agent_id');

    public function historiqueContats()
    {
        return $this->hasMany('App\Models\Rh\HistoriqueContrat');
    }

    public function agent()
    {
        return $this->belongsTo('App\Models\Rh\Agent');
    }

}