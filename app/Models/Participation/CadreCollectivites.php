<?php

namespace App\Models\Participation;

use Illuminate\Database\Eloquent\Model;

class CadreCollectivites extends Model
{
    protected $table = 'cadre_collectivite';
    protected $fillable = array('collectivite_id', 'cadre_id');

    public $timestamps = false;
}
