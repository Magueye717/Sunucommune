<?php

namespace App\Models\GestionProcedure;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model 
{

    protected $table = 'categories';
    public $timestamps = false;
    protected $fillable = array('nom', 'slug');

    public function procedures()
    {
        return $this->hasMany('App\Models\GestionProcedure\Procedure');
    }

}