<?php

namespace App\Models\Participation;

use App\Models\CustomModel;

class PanelCommentaire extends CustomModel
{

    protected $table = 'panel_commentaires';
    public $timestamps = true;
    protected $fillable = array('panel_id', 'commentaire', 'nom', 'email', 'statut', 'parent_id');

    public function panel()
    {
        return $this->belongsTo('App\Models\Participation\Panel');
    }

    public function panelCommentaires()
    {
        return $this->hasMany('App\Models\Participation\PanelCommentaire', 'parent_id');
    }

    public function estActive()
    {
        return $this->statut === 1 ? true : false;
    }

}
