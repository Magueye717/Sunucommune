<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class MembreCabinet extends Model
{

    protected $table = 'membre_cabinets';
    public $timestamps = true;
    protected $fillable = array('nom', 'prenom', 'hierarchie', 'fonction', 'adresse', 'telephone', 'photo', 'statut');

}


