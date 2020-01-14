<?php

namespace App\Models\Participation;

use App\Models\CustomModel;

class PanelCommentaire extends CustomModel
{

    protected $table = 'panel_commentaires';
    public $timestamps = true;
    protected $fillable = array('panel_id', 'commentaire', 'nom', 'email', 'statut');

    public function panel()
    {
        return $this->belongsTo('App\Models\Participation\Panel');
    }

    public function panelCommentaires()
    {
        return $this->hasMany('App\Models\Participation\Panel', 'parent_id');
    }

}
