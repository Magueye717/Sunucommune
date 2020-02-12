<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class MembreCabinet extends Model
{

    protected $table = 'membre_cabinets';
    public $timestamps = true;
    protected $fillable = array('nom', 'prenom', 'fonction', 'adresse', 'telephone', 'photo', 'statut', 'equipe_municipale_id');

    public function equipeMunicipale()
    {
        return $this->belongsTo('App\Models\Commune\EquipeMunicipale');
    }
}


