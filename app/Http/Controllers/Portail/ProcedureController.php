<?php
namespace App\Http\Controllers\Portail;

use App\Repositories\Procedure\ProcedureRepository;
use App\Repositories\Procedure\CategorieRepository;
use App\Models\GestionProcedure\Categorie;
use App\Models\GestionProcedure\Procedure;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProcedureController extends Controller
{

    protected $procedureRepository;
    protected $categorieRepository;

    public function __construct(ProcedureRepository $procedureRepository,
                                CategorieRepository $categorieRepository)
    {
        $this->procedureRepository = $procedureRepository;
        $this->categorieRepository = $categorieRepository;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $etats = Procedure::whereHas('categorie', function ($query) {
            $query->where('nom', 'like', 'Etat civil');
        })->get();

        $fonciers = Procedure::whereHas('categorie', function ($query) {
            $query->where('nom', 'like', 'Foncier');
        })->get();

        $fiscalites = Procedure::whereHas('categorie', function ($query) {
            $query->where('nom', 'like', 'Fiscalite');
        })->get();

        $socials = Procedure::whereHas('categorie', function ($query) {
            $query->where('nom', 'like', 'Social');
        })->get();

        return view('procedure.index',compact('etats','fonciers','fiscalites','socials'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

    }
}
