<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collectivite extends Model
{

    protected $table = 'collectivites';
    public $timestamps = false;

    protected $fillable = array('code', 'nom', 'statut', 'type_collectivite', 'parent_code');

    public function parent()
    {
        return $this->belongsTo('App\Models\Collectivite', 'parent_code', 'code');
    }

    public function cadreConcertations()
    {
        return $this->hasMany('App\Models\Participation\CadreConcertation');
    }

    public function scopeByCodeParent($query, $code)
    {
        if ($code)
            return $query->where('parent_code', 'like', $code . '%');
        return $query;
    }

    public function scopeByType($query, $type)
    {
        if ($type)
            return $query->where('type_collectivite', $type);
        return $query;
    }

    public function scopeByCode($query, $code)
    {
        if ($code)
            return $query->where('code', 'like', $code . '%');
        return $query;
    }

    public function scopeForCollectivite($query, $code)
    {
        return $query->where('code', $code);
    }

    /**
     * Permet de récuperer le département d'un quartier village
     * @return mixed
     */
    public function getDepartementQvAttribute()
    {
        return $this->parent->parent->parent;
    }

    /**
     * Permet de récuperer la région d'un quartier village
     * @return mixed
     */
    public function getRegionQvAttribute()
    {
        return $this->departement_qv->parent;
    }

    public function ressources()
    {
        return $this->hasMany('App\Models\Commune\GestionInfrastructure');
    }

}
