<?php

namespace App\Models\Rh;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model 
{

    protected $table = 'conges';
    public $timestamps = true;
    protected $fillable = array('agent_id', 'type_conge', 'date_debut', 'date_fin', 'date_retour_effectif', 'etat');

    public function agent()
    {
        return $this->belongsTo('App\Models\Rh\Agent');
    }

}