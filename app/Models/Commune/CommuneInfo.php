<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class CommuneInfo extends Model 
{

    protected $table = 'commune_infos';
    public $timestamps = true;
    protected $fillable = array('commune_id', 'maire', 'date_creation', 'superficie', 'population', 'delimitation', 'mot_du_maire', 'photo_maire');

}