<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model 
{

    protected $table = 'parteneaires';
    public $timestamps = true;
    protected $fillable = array('commune_id', 'nom', 'type_partenaire', 'logo', 'url');

}