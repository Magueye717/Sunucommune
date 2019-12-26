<?php

namespace App\Models\Participation;

use Illuminate\Database\Eloquent\Model;

class Sondage extends Model 
{

    protected $table = 'sondages';
    public $timestamps = true;
    protected $fillable = array('commune_id', 'titre', 'slug', 'description', 'date_publication', 'statut', 'add_by');

    public function sondageResultats()
    {
        return $this->hasMany('App\Models\Participation\SondageResultat');
    }

    public function commune()
    {
        return $this->belongsTo('App\Models\Commune\Commune');
    }

    public function sondageOptions()
    {
        return $this->hasMany('App\Models\Participation\SondageOption');
    }

    public function ajouterPar()
    {
        return $this->belongsTo('App\Models\User', 'add_by');
    }

}