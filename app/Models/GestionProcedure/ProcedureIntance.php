<?php

namespace App\Models\GestionProcedure;

use Illuminate\Database\Eloquent\Model;

class ProcedureIntance extends Model 
{

    protected $table = 'procedure_instances';
    public $timestamps = true;
    protected $fillable = array('procedure_id', 'procedure_usager_id', 'numero_depot', 'date_retrait', 'code_etat', 'add_by');

    public function procedure()
    {
        return $this->belongsTo('App\Models\GestionProcedure\Procedure');
    }

    public function procedureUsager()
    {
        return $this->belongsTo('App\Models\GestionProcedure\ProcedureUsager');
    }

    public function ajouterPar()
    {
        return $this->belongsTo('App\Models\User', 'add_by');
    }

}