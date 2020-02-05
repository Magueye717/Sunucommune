<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class EquipeMunicipale extends Model
{
    protected $table = 'equipe_municipales';
    public $timestamps = false;
    protected $fillable = array('libelle', 'description',);

}
