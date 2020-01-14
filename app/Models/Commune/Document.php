<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    public $timestamps = true;
    protected $fillable = array('libelle', 'description', 'add_by');

    public function ajouterPar()
    {
        return $this->belongsTo('App\Models\User', 'add_by');
    }

}
