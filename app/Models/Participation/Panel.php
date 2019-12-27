<?php

namespace App\Models\Participation;

use Illuminate\Database\Eloquent\Model;

class Panel extends Model 
{

    protected $table = 'panel';
    public $timestamps = true;
    protected $fillable = array('commune_id', 'question', 'date_publication', 'statut');

    public function commentaires()
    {
        return $this->hasMany('App\Models\Participation\PanelCommentaire');
    }

}