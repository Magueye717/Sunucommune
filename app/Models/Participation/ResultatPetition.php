<?php

namespace App\Models\Participation;

use Illuminate\Database\Eloquent\Model;

class ResultatPetition extends Model
{
    protected $table = 'resutat_petitions';
    public $timestamps = true;
    protected $fillable = array('add_by', 'petition_id');

    public function ajouterPar()
    {
        return $this->belongsTo('App\Models\User', 'add_by');
    }
    public function petition()
    {
        return $this->hasMany('App\Models\Participation\Petition', 'petition_id');
    }
}
