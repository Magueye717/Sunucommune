<?php

namespace App\Models\GestionProcedure;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{

    protected $table = 'procedures';
    public $timestamps = true;
    protected $fillable = array('categorie_id', 'titre', 'description', 'couts', 'lieu_depot', 'statut');

    public function categorie()
    {
        return $this->belongsTo('App\Models\GestionProcedure\Categorie');
    }

    public function procedurePieces()
    {
        return $this->hasMany('App\Models\GestionProcedure\ProcedurePiece');
    }

    public function estActive()
    {
        return $this->statut === 1 ? true : false;
    }
    

}
