<?php

namespace App\Models\Participation;

use App\Models\CustomModel;

class Panel extends CustomModel
{

    protected $table = 'panel';
    public $timestamps = true;
    protected $fillable = array('question','description','photo','fichier','date_publication', 'statut', 'thematique_id');

    public function commentaires()
    {
        return $this->hasMany('App\Models\Participation\PanelCommentaire');
    }

    public function thematiques()
    {
        return $this->hasMany('App\Models\Participation\Thematique','thematique_id');
    }
}
