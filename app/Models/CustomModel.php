<?php

namespace App\Models;

use App\Enums\ModelStatut;
use Illuminate\Database\Eloquent\Model;

abstract class CustomModel extends Model
{

    public function scopeIsActif($query)
    {
        return $query->where('statut', ModelStatut::Actif);
    }

}
