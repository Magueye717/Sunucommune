<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class Mediatheque extends Model
{

    protected $table = 'mediatheques';
    public $timestamps = true;
    protected $fillable = array('commune_id', 'type_media', 'fichier', 'description');

}