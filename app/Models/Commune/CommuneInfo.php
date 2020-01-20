<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class CommuneInfo extends Model
{

    protected $table = 'commune_infos';
    public $timestamps = true;
    protected $fillable = array('collectivite_id', 'maire', 'date_creation', 'superficie', 'population', 'delimitation',
        'mot_du_maire', 'photo_maire', 'historique');

    public function ancienMaires()
    {
        return $this->hasMany('App\Models\Commune\AncienMaire');
    }

    public function collectivite()
    {
        return $this->belongsTo('App\Models\Collectivite', 'collectivite_id');
    }

    public function membreCadres()
    {
        return $this->hasMany('App\Models\Participation\MembreCadre');
    }

}
