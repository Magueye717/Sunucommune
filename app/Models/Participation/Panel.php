<?php

namespace App\Models\Participation;

use App\Models\CustomModel;

class Panel extends CustomModel
{

    protected $table = 'panel';
    public $timestamps = true;
    protected $fillable = array('question', 'date_publication', 'statut');

    public function commentaires()
    {
        return $this->hasMany('App\Models\Participation\PanelCommentaire');
    }

}