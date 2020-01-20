<?php

namespace App\Models\GestionInfrastructure;

use Illuminate\Database\Eloquent\Model;

class Secteur extends Model 
{

    protected $table = 'secteurs';
    public $timestamps = false;
    protected $fillable = array('nom', 'nom_court');

    public function resssources()
    {
        return $this->hasMany('App\Models\GestionInfrastructure\Ressource');
    }

}