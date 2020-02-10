<?php

namespace App\Models\GestionInfrastructure;

use Illuminate\Database\Eloquent\Model;

class Ressource extends Model 
{

    protected $table = 'ressources';
    public $timestamps = true;
    protected $fillable = array('commune_id', 'secteur_id', 'nom', 'description', 'heure_ouverture', 'heure_fermeture', 'photo', 'longitude', 'latittude', 'altitude', 'adresse', 'personne_contact', 'email', 'telephone', 'statut', 'add_by');

    public function secteur()
    {
        return $this->belongsTo('App\Models\GestionInfrastructure\Secteur');
    }

    public function ajouterPar()
    {
        return $this->belongsTo('App\Models\User', 'add_by');
    }

}