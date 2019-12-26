<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class CommuneHistorique extends Model 
{

    protected $table = 'commune_historiques';
    public $timestamps = true;
    protected $fillable = array('commune_id', 'description');

    public function commune()
    {
        return $this->belongsTo('App\Models\Commune\Commune');
    }

    public function ancienMaires()
    {
        return $this->hasMany('App\Models\Commune\AncienMaire');
    }

}