<?php

namespace App\Models\Participation;

use Illuminate\Database\Eloquent\Model;

class Thematique extends Model
{
    protected $table = 'thematiques';
    public $timestamps = true;
    protected $fillable = array('libelle', 'description');

    public function panel()
    {
        return $this->belongsTo('App\Models\Participation\Panel');
    }
}
