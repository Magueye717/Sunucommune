<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class TypeArticle extends Model 
{

    protected $table = 'type_articles';
    public $timestamps = false;
    protected $fillable = array('libelle', 'description');

}