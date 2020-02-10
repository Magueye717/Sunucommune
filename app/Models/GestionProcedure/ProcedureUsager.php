<?php

namespace App\Models\GestionProcedure;

use Illuminate\Database\Eloquent\Model;

class ProcedureUsager extends Model 
{

    protected $table = 'procedure_usagers';
    public $timestamps = true;
    protected $fillable = array('nom', 'prenom', 'adresse', 'email', 'telephone', 'cin', 'date_naissance', 'lieu_naissance');

}