<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class Mediatheques extends Model 
{

    protected $table = 'mediatheques';
    public $timestamps = true;
    protected $fillable = array('commune_id', 'type_media', 'fichier', 'description');

    public function commune()
    {
        return $this->belongsTo('App\Models\Commune\Commune');
    }

}