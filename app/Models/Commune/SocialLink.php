<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $table = 'social_links';
    public $timestamps = false;
    protected $fillable = array('libelle', 'url', 'membre_cabinet_id', 'cle');

    public function memebreCabinet()
    {
        return $this->belongsTo('App\Models\Commune\MembreCabinet');
    }

    /* public function memebreCadres()
    {
        return $this->belongsToMany('App\Models\Participation\MemebreCadre');
    } */

    public function getLogoAttribute()
    {
        if ($this->attributes['libelle']==='Facebook') {
            return "fab fa-facebook-f";
        }
        elseif($this->attributes['libelle']==='LinkedIn'){
            return "fab fa-linkedin-in";

        }elseif($this->attributes['libelle']==='Whatsapp'){
            return "fab fa-whatsapp";
        }
        elseif($this->attributes['libelle']==='Twitter'){
            return "fab fa-twitter";
        }
        elseif($this->attributes['libelle']==='Youtube'){
            return "fab fa-youtube-square";
        }

    }

    /* public function setCleAttribute($value)
    {
        $this->attributes['cle']= $this->libelle;//$this->attributes['libelle']."_" .$this->attributes['membre_cabinet_id'];
    } */
    
}
