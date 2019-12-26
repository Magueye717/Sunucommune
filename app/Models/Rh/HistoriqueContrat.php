<?php

namespace App\Models\Rh;

use Illuminate\Database\Eloquent\Model;

class HistoriqueContrat extends Model 
{

    protected $table = 'historique_contrats';
    public $timestamps = true;
    protected $fillable = array('agent_id', 'contrat_id', 'date_debut', 'date_fin');

}