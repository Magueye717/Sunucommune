<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class MembreCabinet extends Model 
{

    protected $table = 'membre_cabinets';
    public $timestamps = true;
    protected $fillable = array('commune_id', 'nom', 'prenom', 'fonction', 'adresse', 'telephone', 'statut');

}