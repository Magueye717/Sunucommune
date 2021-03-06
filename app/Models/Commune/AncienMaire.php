<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class AncienMaire extends Model 
{

    protected $table = 'ancien_maires';
    public $timestamps = true;
    protected $fillable = array('commune_info_id', 'nom', 'prenom', 'photo', 'biographie', 'date_debut_mandat', 'date_fin_mandat');

    public function communeInfo()
    {
        return $this->belongsTo('App\Models\Commune\CommuneInfo');
    }

}