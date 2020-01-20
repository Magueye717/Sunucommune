<?php

namespace App\Models\Participation;

use Illuminate\Database\Eloquent\Model;

class SondageOption extends Model
{

    protected $table = 'sondage_options';
    public $timestamps = false;
    protected $fillable = array('sondage_id', 'libelle');

}