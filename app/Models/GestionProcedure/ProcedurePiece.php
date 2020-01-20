<?php

namespace App\Models\GestionProcedure;

use Illuminate\Database\Eloquent\Model;

class ProcedurePiece extends Model 
{

    protected $table = 'procedure_pieces';
    public $timestamps = true;
    protected $fillable = array('nom', 'description', 'extension', 'procedure_id');

    public function procedure()
    {
        return $this->belongsTo('App\Models\GestionProcedure\Procedure');
    }

}