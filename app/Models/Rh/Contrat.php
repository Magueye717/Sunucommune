<?php

namespace App\Models\Rh;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model 
{

    protected $table = 'contrats';
    public $timestamps = false;
    protected $fillable = array('nom', 'type_contrat');

    public function historiqueContats()
    {
        return $this->hasMany('App\Models\Rh\HistoriqueContrat');
    }

}