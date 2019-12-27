<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class Article extends Model 
{

    protected $table = 'articles';
    public $timestamps = true;
    protected $fillable = array('commune_id', 'slug', 'titre', 'texte', 'photo', 'type_article_id', 'piece_jointe', 'add_by');

    public function typeArticle()
    {
        return $this->belongsTo('App\Models\Commune\TypeArticle');
    }

    public function ajouterPar()
    {
        return $this->belongsTo('App\Models\User', 'add_by');
    }

}