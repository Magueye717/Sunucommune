<?php

namespace App\Models\Participation;

use Illuminate\Database\Eloquent\Model;

class PanelCommentaire extends Model 
{

    protected $table = 'panel_commentaires';
    public $timestamps = true;
    protected $fillable = array('panel_id', 'commentaire', 'nom', 'email', 'statut');

    public function panel()
    {
        return $this->belongsTo('App\Models\Participation\Panel');
    }

}