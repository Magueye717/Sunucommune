<?php

namespace App\Models\Participation;

use Illuminate\Database\Eloquent\Model;

class CadreConcertationCollectivite extends Model
{
    protected $table = 'cadre_concertation_collectivite';
    protected $fillable = array('collectivite_id', 'cadre_concertation_id');

    public $timestamps = false;
}
