<?php

namespace App\Models\Commune;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agendas';
    public $timestamps = true;
    protected $fillable = array( 'activite', 'titre', 'lieu', 'photo', 'date', 'piece_jointe', 'add_by');

}
