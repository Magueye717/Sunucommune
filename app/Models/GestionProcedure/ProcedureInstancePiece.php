<?php

namespace App\Models\GestionProcedure;

use Illuminate\Database\Eloquent\Model;

class ProcedureInstancePiece extends Model 
{

    protected $table = 'procedure_instance_pieces';
    public $timestamps = true;
    protected $fillable = array('procedure_instance_id', 'procedure_piece_id', 'fichier', 'extension');

}