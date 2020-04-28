<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agendas';
    public $timestamps = true;
    protected $fillable = array( 'libelle', 'lieu', 'photo', 'description', 'date_evenement', 'add_by', 'collectivite_id');

    public function ajouterPar()
    {
        return $this->belongsTo('App\Models\User', 'add_by');
    }

    public function collectivite()
    {
        return $this->belongsTo('App\Models\Collectivite', 'collectivite_id');
    }

    public function estPublie(){
        return $this->est_publie === 1 ? true : false;
    }

}
